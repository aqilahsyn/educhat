@extends('layouts.dosen')

@section('title', 'Tambah Materi - EduChat')

@section('content')
@php
    // frontend dummy list (anggap sudah pernah upload)
    $existingFiles = []; // isi kalau mau contoh awal
@endphp

<div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-100 dark:border-slate-800 shadow-sm p-10">
    <h1 class="text-2xl font-semibold text-slate-900 dark:text-slate-50">
        Tambah Materi
    </h1>

    <div class="mt-3 flex items-center gap-2">
        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
            {{ $courseTitle }}
        </span>
        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-rose-100 text-rose-700">
            CLO {{ $clo }}
        </span>
    </div>

    {{-- FORM (dummy dulu) --}}
    <form action="{{ route('dosen.materi.store') }}" method="POST" enctype="multipart/form-data" class="mt-6">
        @csrf

        <input type="hidden" name="clo" value="{{ $clo }}">

        {{-- Judul --}}
        <div>
            <label class="block text-sm font-semibold text-slate-900 dark:text-slate-50 mb-2">
                Judul Materi
            </label>
            <input
                type="text"
                name="judul"
                placeholder="Masukkan judul materi..."
                class="w-full max-w-2xl h-11 rounded-2xl border border-slate-300 dark:border-slate-700
                       bg-white dark:bg-slate-950/30 px-4 text-sm outline-none
                       focus:ring-4 focus:ring-[#9D1535]/10 focus:border-[#9D1535]">
        </div>

        {{-- Kotak biru: file yang sudah “masuk” --}}
        <div class="mt-6">
            <p class="text-sm font-semibold text-slate-900 dark:text-slate-50 mb-3">
                File yang telah terunggah
            </p>

            <div id="uploadedBox"
                 class="rounded-2xl border border-slate-200/70 dark:border-slate-800 bg-[#F5F8FF] dark:bg-slate-800/30
                        p-6 min-h-[160px]">
                <div id="fileGrid" class="grid grid-cols-6 gap-6">
                    {{-- akan diisi via JS --}}
                </div>

                <p id="emptyHint" class="text-sm text-slate-400">
                    Belum ada file. Drop PDF ke area upload di bawah ya.
                </p>
            </div>
        </div>

        {{-- Dropzone garis putus-putus --}}
        <div class="mt-4">
            <label class="block text-sm font-semibold text-slate-900 dark:text-slate-50 mb-3">
                Upload PDF
            </label>

            <div id="dropzone"
                 class="rounded-2xl border border-dashed border-slate-400/70 dark:border-slate-600
                        h-[220px] flex items-center justify-center text-slate-400
                        hover:bg-slate-50 dark:hover:bg-slate-950/30 transition cursor-pointer">
                <div class="text-center">
                    <div class="text-lg">📄</div>
                    <p class="mt-2 text-sm">Upload file disini atau drag file kesini</p>
                    <p class="mt-1 text-xs">Format: PDF</p>
                </div>
            </div>

            {{-- input file asli (hidden) --}}
            <input id="fileInput" type="file" name="files[]" class="hidden" multiple accept="application/pdf">
        </div>

        {{-- Buttons --}}
        <div class="mt-10 flex items-center justify-center gap-6">
            <button type="submit"
                    class="w-[340px] h-12 rounded-2xl bg-[#9D1535] text-white font-semibold shadow-sm hover:bg-[#82112c] transition">
                Simpan dan tampilkan
            </button>

            <a href="{{ route('dosen.dashboard', ['clo' => $clo]) }}"
               class="w-[340px] h-12 rounded-2xl bg-slate-300 text-white font-semibold flex items-center justify-center hover:bg-slate-400 transition">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
