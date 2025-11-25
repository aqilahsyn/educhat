<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    private function ensureAdmin($user)
    {
        if (!$user || $user->role !== 'admin') {
            abort(response()->json(['message' => 'Forbidden'], 403));
        }
    }

    // GET /admin/lecturers?search=...
    public function searchLecturers(Request $request)
    {
        $user = $request->user();
        $this->ensureAdmin($user);

        $q = $request->query('search');

        $lecturers = User::where('role', 'dosen')
            ->when($q, function ($query) use ($q) {
                $query->where(function ($qq) use ($q) {
                    $qq->where('email', 'like', "%{$q}%")
                       ->orWhere('name', 'like', "%{$q}%");
                });
            })
            ->orderBy('name')
            ->limit(10)
            ->get(['id', 'name', 'email']);

        return response()->json($lecturers);
    }

    // POST /admin/coordinator
    public function assignCoordinator(Request $request)
    {
        $user = $request->user();
        $this->ensureAdmin($user);

        $data = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'user_id'   => 'required|exists:users,id',
        ]);

        $course = Course::findOrFail($data['course_id']);
        $lecturer = User::where('role', 'dosen')->findOrFail($data['user_id']);

        $course->coordinators()->syncWithoutDetaching([
            $lecturer->id => ['type' => 'coordinator'],
        ]);

        return response()->json([
            'message' => 'Coordinator assigned',
            'course'  => $course->load('coordinators:id,name,email'),
        ]);
    }

    // GET /admin/courses
    public function coursesWithClos(Request $request)
    {
        $user = $request->user();
        $this->ensureAdmin($user);

        $courses = Course::with([
            'coordinators:id,name,email',
            'clos' => fn($q) => $q->orderBy('order'),
        ])->orderBy('code')->get();

        return response()->json($courses);
    }
}
