<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Clo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StudentController extends Controller
{
    // sidebar Learning Path
    public function courses()
    {
        $courses = Course::with('clos')->get();
        return response()->json($courses);
    }

    // halaman detail CLO (ringkasan + daftar materi)
    public function cloDetail(Clo $clo)
    {
        $clo->load(['course', 'materials.files']);
        return response()->json($clo);
    }

    // profil mahasiswa
    public function profile(Request $request)
    {
        $u = $request->user();

        if ($u->role !== 'mahasiswa') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        return response()->json([
            'name'  => $u->name,
            'nim'   => $u->nim,
            'email' => $u->email,
        ]);
    }
}
