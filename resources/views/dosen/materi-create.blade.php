{{-- resources/views/dosen/materi-create.blade.php --}}
@extends('layouts.dosen')

@section('title', 'Tambah Materi - EduChat')

@section('content')
<div class="flex min-h-screen bg-[#F4F7FB] dark:bg-slate-950">

    {{-- content wrapper --}}
    <main class="flex-1 px-10 py-8">
        <div class="bg-white dark:bg-slate-900 rounded-[32px] border border-slate-100 dark:border-slate-800 shadow-sm p-10">

            <h1 class="text-3xl font-semibold text-slate-900 dark:text-slate-50">
                Tambah Materi
            </h1>

            <div class="mt-4 flex items-center gap-2">
                <span class="text-xs px-3 py-1 rounded-full bg-blue-100 text-blue-700 dark:bg-blue-500/15 dark:text-blue-200">
                    {{ $courseName ?? 'Strategi Algoritma' }}
                </span>
                <span class="text-xs px-3 py-1 rounded-full bg-red-100 text-red-700 dark:bg-red-500/15 dark:text-red-200">
                    CLO {{ $clo ?? 1 }}
                </span>
            </div>

            {{-- judul materi --}}
            <div class="mt-8">
                <label class="block text-sm font-semibold text-slate-900 dark:text-slate-50">
                    Judul Materi
                </label>
                <input
                    type="text"
                    class="mt-3 w-full max-w-2xl rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 px-4 py-3 text-sm outline-none focus:ring-4 focus:ring-[#9D1535]/10"
                    placeholder="Masukkan judul materi..."
                />
            </div>

            {{-- file yang telah terunggah --}}
            <div class="mt-7">
                <p class="text-sm font-semibold text-slate-900 dark:text-slate-50">
                    File yang telah terunggah
                </p>

                <div id="uploadedBox"
                     class="mt-3 rounded-2xl border border-slate-100 dark:border-slate-800 bg-[#F3F6FF] dark:bg-slate-900/50 p-4 min-h-[160px]">
                    {{-- grid preview file --}}
                    <div id="fileGrid"
                         class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-4">
                        {{-- item preview akan di-inject via JS --}}
                    </div>

                    {{-- empty state --}}
                    <div id="emptyState"
                         class="text-xs text-slate-500 dark:text-slate-400 mt-2">
                        Belum ada file. Drag & drop ke kotak upload di bawah untuk menambahkan.
                    </div>
                </div>
            </div>

            {{-- dropzone --}}
            <div class="mt-5">
                <input id="fileInput" type="file" class="hidden" multiple accept=".pdf,.ppt,.pptx,.doc,.docx" />

                <div id="dropzone"
                     class="rounded-2xl border border-dashed border-slate-400/70 dark:border-slate-600
                            bg-white dark:bg-slate-900
                            h-[320px] flex items-center justify-center text-center
                            transition">
                    <div class="flex flex-col items-center gap-2">
                        <div class="w-10 h-10 rounded-2xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center">
                            📄
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400">
                            Upload File disini atau drag file kesini
                        </p>

                        <button id="browseBtn"
                                type="button"
                                class="mt-2 text-xs font-semibold px-4 py-2 rounded-full
                                       border border-slate-200 dark:border-slate-700
                                       hover:bg-slate-50 dark:hover:bg-slate-800">
                            Pilih File
                        </button>
                    </div>
                </div>

                <p class="mt-3 text-[11px] text-slate-500 dark:text-slate-400">
                    *Frontend-only: file tidak benar-benar tersimpan ke server dulu. Nanti tinggal sambungkan ke backend.
                </p>
            </div>

            {{-- actions --}}
            <div class="mt-10 flex items-center justify-center gap-6">
                <button id="saveBtn"
                        type="button"
                        class="h-12 w-[320px] rounded-2xl bg-[#9D1535] text-white font-semibold text-sm
                               shadow-sm hover:bg-[#7f102b] transition">
                    Simpan dan tampilkan
                </button>

                <a href="{{ route('dosen.dashboard') }}"
                   class="h-12 w-[320px] rounded-2xl bg-slate-300/80 text-slate-700 font-semibold text-sm
                          flex items-center justify-center hover:bg-slate-300 transition">
                    Kembali
                </a>
            </div>

        </div>
    </main>
</div>
@endsection
