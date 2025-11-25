<?php

namespace App\Http\Controllers;

use App\Models\Clo;
use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LecturerController extends Controller
{
    // ADMIN: boleh semua course
    // DOSEN: hanya course yang dia koordinator
    private function canEditCourse($user, int $courseId): bool
    {
        if ($user->role === 'admin') {
            return true;
        }

        if ($user->role === 'dosen') {
            return $user->coordinatedCourses()->where('id', $courseId)->exists();
        }

        return false;
    }

    // list course + CLO + materi yang bisa diedit (admin: semua, dosen: miliknya)
    public function myCourses(Request $request)
    {
        $user = $request->user();

        if ($user->role === 'admin') {
            $courses = Course::with(['clos.materials.files'])->get();
        } elseif ($user->role === 'dosen') {
            $courses = $user->coordinatedCourses()
                ->with(['clos.materials.files'])
                ->get();
        } else {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        return response()->json($courses);
    }

    // update ringkasan CLO
    public function updateClo(Request $request, Clo $clo)
    {
        $user = $request->user();

        if (!$this->canEditCourse($user, $clo->course_id)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $data = $request->validate([
            'summary'     => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $clo->update($data);

        return response()->json($clo);
    }

    // suggestion judul materi
    public function suggestMaterials(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'clo_id' => 'required|exists:clos,id',
            'q'      => 'nullable|string',
        ]);

        $clo = Clo::with('course')->findOrFail($data['clo_id']);

        if (!$this->canEditCourse($user, $clo->course_id)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $q = $data['q'] ?? '';

        $materials = Material::where('clo_id', $clo->id)
            ->when($q, fn($query) => $query->where('title', 'like', "%{$q}%"))
            ->orderBy('title')
            ->limit(10)
            ->get(['id', 'title']);

        return response()->json($materials);
    }

    // tambah materi baru / tambah file ke materi lama
    public function storeMaterialWithFile(Request $request, Clo $clo)
    {
        $user = $request->user();

        if (!$this->canEditCourse($user, $clo->course_id)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $data = $request->validate([
            'material_id' => 'nullable|exists:materials,id',
            'title'       => 'required_without:material_id|string',
            'description' => 'nullable|string',
            'file.*'      => 'nullable|file|mimes:pdf|max:20480',
            'pdf_url'     => 'nullable|url',
        ]);

        if (!empty($data['material_id'])) {
            $material = Material::where('clo_id', $clo->id)
                ->findOrFail($data['material_id']);

            if (!empty($data['description'])) {
                $material->description = $data['description'];
                $material->save();
            }
        } else {
            $material = Material::create([
                'clo_id'      => $clo->id,
                'title'       => $data['title'],
                'description' => $data['description'] ?? null,
            ]);
        }

        $files = [];

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploaded) {
                $path = $uploaded->store('materials', 'public');

                $files[] = $material->files()->create([
                    'pdf_path' => $path,
                    'pdf_url'  => null,
                ]);
            }
        }

        if (!empty($data['pdf_url'])) {
            $files[] = $material->files()->create([
                'pdf_path' => null,
                'pdf_url'  => $data['pdf_url'],
            ]);
        }

        return response()->json([
            'material' => $material->load('files'),
            'files'    => $files,
        ], 201);
    }

    // upload header image matkul (opsional)
    public function uploadCourseHeader(Request $request, Course $course)
    {
        $user = $request->user();

        if (!$this->canEditCourse($user, $course->id)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $data = $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $path = $data['image']->store('course_headers', 'public');

        $course->header_image_path = $path;
        $course->save();

        return response()->json([
            'message' => 'Header updated',
            'url'     => asset('storage/'.$path),
        ]);
    }

    // profil dosen/admin
    public function profile(Request $request)
    {
        $user = $request->user();

        if ($user->role === 'dosen') {
            $user->load('coordinatedCourses:id,code,name');

            return response()->json([
                'email'   => $user->email,
                'name'    => $user->name,
                'title'   => $user->title,
                'nip'     => $user->nip,
                'role'    => $user->role,
                'courses' => $user->coordinatedCourses,
            ]);
        }

        if ($user->role === 'admin') {
            return response()->json([
                'email' => $user->email,
                'name'  => $user->name,
                'role'  => $user->role,
            ]);
        }

        return response()->json(['message' => 'Forbidden'], 403);
    }
}
