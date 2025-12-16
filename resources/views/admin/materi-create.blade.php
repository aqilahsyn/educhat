{{-- resources/views/admin/materi-create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tambah Materi - Admin')

@section('content')
@php
  $courses = [
    1 => 'Algoritma Pemrograman',
    2 => 'Algoritma Pemrograman Lanjutan',
    3 => 'Analisis Kompleksitas Algoritma',
    4 => 'Strategi Algoritma',
  ];

  $courseName = $courses[$currentCourse] ?? 'Mata Kuliah';
  $clo = $clo ?? 1;
@endphp

<div class="bg-white rounded-[28px] border border-slate-200 p-10">

  {{-- Header --}}
  <div class="flex items-start justify-between gap-6 mb-10">
    <div>
      <h1 class="text-3xl font-semibold text-slate-900">Tambah Materi</h1>

      <div class="mt-4 flex items-center gap-2">
        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
          {{ $courseName }}
        </span>
        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-rose-100 text-rose-700">
          CLO {{ $clo }}
        </span>
      </div>
    </div>
  </div>

  {{-- Form --}}
  <div class="space-y-8">

    {{-- Judul --}}
    <div class="max-w-2xl">
      <label class="text-sm font-semibold text-slate-900">Judul Materi</label>
      <input
        type="text"
        class="mt-2 w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#9D1535]/20"
        placeholder="Masukkan judul materi..." />
    </div>

    {{-- Upload --}}
    <div>
      <label class="text-sm font-semibold text-slate-900">Upload File</label>

      {{-- Preview grid (dummy frontend) --}}
      <div
        class="mt-3 bg-slate-50 rounded-3xl border border-slate-200 p-6">
        <div id="fileGrid" class="grid grid-cols-6 gap-6"></div>

        <p id="emptyHint" class="text-sm text-slate-400">
          Belum ada file. Upload dulu ya.
        </p>
      </div>

      {{-- Dropzone --}}
      <div
        id="dropzone"
        class="mt-6 rounded-3xl border-2 border-dashed border-slate-300 bg-white p-10 text-center cursor-pointer hover:bg-slate-50 transition">
        <div class="flex flex-col items-center gap-3">
          <div class="w-10 h-10 rounded-2xl bg-slate-100 flex items-center justify-center">
            📄
          </div>
          <p class="text-sm text-slate-500">Upload File disini</p>
          <p class="text-xs text-slate-400">Klik atau drag & drop (PDF)</p>
        </div>

        <input id="fileInput" type="file" class="hidden" accept=".pdf" multiple />
      </div>
    </div>

    {{-- Footer buttons --}}
    <div class="pt-8 flex items-center justify-center gap-8">
      <button
        type="button"
        class="w-[420px] py-4 rounded-full bg-[#9D1535] text-white font-semibold shadow hover:opacity-95">
        Save and Display
      </button>

      <a
        href="{{ route('admin.course.show', $currentCourse) }}"
        class="w-[420px] py-4 rounded-full bg-slate-300 text-white font-semibold text-center hover:bg-slate-400">
        Back
      </a>
    </div>

  </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", () => {
  const dropzone = document.getElementById("dropzone");
  const fileInput = document.getElementById("fileInput");
  const fileGrid = document.getElementById("fileGrid");
  const emptyHint = document.getElementById("emptyHint");

  if (!dropzone || !fileInput || !fileGrid || !emptyHint) return;

  const filesState = [];

  const render = () => {
    fileGrid.innerHTML = "";

    if (filesState.length === 0) {
      emptyHint.classList.remove("hidden");
      return;
    }
    emptyHint.classList.add("hidden");

    filesState.forEach((file, idx) => {
      const item = document.createElement("div");
      item.className = "flex flex-col items-center text-center gap-2";

      item.innerHTML = `
        <div class="w-12 h-12 flex items-center justify-center">
          <span class="text-4xl">📕</span>
        </div>
        <p class="text-xs font-semibold text-slate-900 truncate w-full" title="${file.name}">
          ${file.name}
        </p>
        <button type="button" class="text-xs text-rose-600 hover:underline" data-remove="${idx}">
          Hapus
        </button>
      `;

      fileGrid.appendChild(item);
    });

    fileGrid.querySelectorAll("[data-remove]").forEach(btn => {
      btn.addEventListener("click", () => {
        const i = parseInt(btn.getAttribute("data-remove"), 10);
        filesState.splice(i, 1);
        render();
      });
    });
  };

  const addFiles = (fileList) => {
    const incoming = Array.from(fileList || []);
    const pdfs = incoming.filter(f => f.type === "application/pdf" || f.name.toLowerCase().endsWith(".pdf"));
    if (!pdfs.length) return;

    pdfs.forEach(f => filesState.push(f));
    render();
  };

  dropzone.addEventListener("click", () => fileInput.click());

  fileInput.addEventListener("change", (e) => {
    addFiles(e.target.files);
    fileInput.value = "";
  });

  dropzone.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropzone.classList.add("ring-4", "ring-[#9D1535]/10");
  });

  dropzone.addEventListener("dragleave", () => {
    dropzone.classList.remove("ring-4", "ring-[#9D1535]/10");
  });

  dropzone.addEventListener("drop", (e) => {
    e.preventDefault();
    dropzone.classList.remove("ring-4", "ring-[#9D1535]/10");
    addFiles(e.dataTransfer.files);
  });

  render();
});
</script>
@endpush
