<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function create(Request $request)
    {
        $clo = (int) $request->query('clo', 1);
        if (!in_array($clo, [1,2,3])) $clo = 1;

        // dummy: nanti ambil dari DB
        $courseTitle = 'Strategi Algoritma';

        return view('dosen.materi-create', compact('clo', 'courseTitle'));
    }

    public function store(Request $request)
    {
        // nanti isi upload + simpan DB
        return redirect()->route('dosen.dashboard', ['clo' => $request->input('clo', 1)]);
    }
}
