{{-- resources/views/admin/course.blade.php --}}
@extends('layouts.admin')

@section('title', 'Course Detail - Admin')

@section('content')

{{-- CLO --}}
@php
  // ambil course aktif
  $courseId = $currentCourse ?? 1;

  // dummy CLO per course (silakan kamu atur)
  $courseClos = [
      1 => [1, 2, 3],      // Algoritma Pemrograman
      2 => [1, 2, 3],   // Algoritma Pemrograman Lanjutan
      3 => [1, 2, 3],      // Analisis Kompleksitas Algoritma
      4 => [1, 2],   // Strategi Algoritma
  ];

  $clos = $courseClos[$courseId] ?? [1];

  // ambil CLO dari query param: /admin/course/{id}?clo=2
  $activeClo = (int) request()->query('clo', $clos[0]);

  // safety: klo user nulis ?clo=99, balikin ke CLO pertama yang valid
  if (!in_array($activeClo, $clos)) {
    $activeClo = $clos[0];
  }

@endphp


{{-- COURSE HEADER --}}
<div class="bg-white rounded-3xl border border-slate-200 p-8 mb-8">
    <h1 class="text-xl font-semibold mb-4">{{ $currentCourse }}</h1>
    <div class="flex items-center justify-between mb-2">
    <p class="text-sm font-semibold">Ringkasan Materi</p>

    <div class="flex gap-2">
        <button id="summaryEditBtn"
                class="px-3 py-2 rounded-xl border text-xs font-semibold hover:bg-slate-50">
        Edit
        </button>

        <button id="summarySaveBtn"
                class="px-3 py-2 rounded-xl bg-[#9D1535] text-white text-xs font-semibold hidden">
        Simpan
        </button>

        <button id="summaryCancelBtn"
                class="px-3 py-2 rounded-xl border text-xs font-semibold hidden hover:bg-slate-50">
        Batal
        </button>
    </div>
    </div>

    {{-- VIEW MODE --}}
    <div id="summaryText"
        class="rounded-2xl border border-slate-200 p-4 text-sm text-slate-600 bg-white">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit...
    </div>

    {{-- EDIT MODE --}}
    <textarea id="summaryTextarea"
            class="hidden w-full rounded-2xl border border-slate-200 p-4 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#9D1535]/20"
            rows="4">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</textarea>

    <p id="summaryHint" class="hidden mt-2 text-xs text-slate-400">
    Klik “Simpan” untuk menyimpan perubahan, atau “Batal” untuk kembali.
    </p>

    </div>

{{-- DOSEN --}}
<div class="bg-white rounded-3xl border border-slate-200 p-8 mb-8">

    <div class="flex justify-between items-center mb-4">
        <p class="text-sm font-semibold">Daftar Dosen</p>
        <button
            id="openAddDosen"
            class="px-4 py-2 rounded-xl bg-[#9D1535] text-white text-sm">
            + Tambah Dosen
        </button>
    </div>

    <table class="w-full text-sm border rounded-xl overflow-hidden">
        <thead class="bg-pink-100">
            <tr>
                <th class="p-3 text-left">Nama</th>
                <th class="p-3 text-left">Email Dosen</th>
                <th class="p-3 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-t">
                <td class="p-3">Nama Dosen</td>
                <td class="p-3">aaa@email.com</td>
                <td class="p-3 text-red-600 cursor-pointer">Hapus</td>
            </tr>
        </tbody>
    </table>

</div>

{{-- MODAL TAMBAH DOSEN --}}
<div id="addDosenModal"
     class="fixed inset-0 z-50 hidden items-center justify-center">

    {{-- Overlay --}}
    <div id="addDosenOverlay"
         class="absolute inset-0 bg-black/40"></div>

    {{-- Modal --}}
    <div class="relative bg-white rounded-3xl w-full max-w-md p-6 z-10">

        <h2 class="text-lg font-semibold mb-4">
            Tambah Dosen
        </h2>

        <div class="space-y-4">
            <div>
                <label class="text-sm font-medium">Nama Dosen</label>
                <input type="text"
                       class="mt-1 w-full px-4 py-2 rounded-xl border">
            </div>

            <div>
                <label class="text-sm font-medium">Email Dosen</label>
                <input type="email"
                       class="mt-1 w-full px-4 py-2 rounded-xl border">
            </div>
        </div>

        <div class="mt-6 flex justify-end gap-3">
            <button id="closeAddDosen"
                    class="px-4 py-2 rounded-xl border text-sm">
                Batal
            </button>

            <button
                class="px-4 py-2 rounded-xl bg-[#9D1535] text-white text-sm opacity-70 cursor-not-allowed">
                Simpan
            </button>
        </div>

    </div>
</div>

{{-- MODAL TAMBAH MATERI --}}
<div class="bg-white rounded-3xl border border-slate-200 p-8">

  <p class="text-sm font-semibold mb-4">Pilih CLO</p>

  {{-- tombol CLO: FULL WIDTH --}}
  <div class="flex gap-3 mb-6 w-full">
    @foreach($clos as $clo)
      <a
        href="{{ route('admin.course.show', $courseId) }}?clo={{ $clo }}"
        class="flex-1 text-center px-6 py-2 rounded-full border transition text-sm font-semibold
        {{ $activeClo === (int)$clo
            ? 'bg-[#9D1535] text-white border-[#9D1535]'
            : 'bg-white hover:bg-slate-50 text-slate-700 border-slate-200' }}"
      >
        CLO {{ $clo }}
      </a>
    @endforeach
  </div>

  <div class="flex items-center justify-between mb-2">
    <p class="text-sm font-semibold">Ringkasan Materi (CLO {{ $activeClo }})</p>

    <div class="flex gap-2">
      <button id="cloSummaryEditBtn"
              class="px-3 py-2 rounded-xl border text-xs font-semibold hover:bg-slate-50">
        Edit
      </button>

      <button id="cloSummarySaveBtn"
              class="px-3 py-2 rounded-xl bg-[#9D1535] text-white text-xs font-semibold hidden">
        Simpan
      </button>

      <button id="cloSummaryCancelBtn"
              class="px-3 py-2 rounded-xl border text-xs font-semibold hidden hover:bg-slate-50">
        Batal
      </button>
    </div>
  </div>

  {{-- penting: value-nya ikut activeClo --}}
  <input type="hidden" id="activeCloValue" value="{{ $activeClo }}" />

  {{-- VIEW MODE --}}
  <div id="cloSummaryText"
       class="rounded-2xl border border-slate-200 p-4 text-sm text-slate-600 bg-white mb-6">
    Ringkasan untuk Course {{ $courseId }} - CLO {{ $activeClo }} (dummy)
  </div>

  {{-- EDIT MODE --}}
  <textarea id="cloSummaryTextarea"
            class="hidden w-full rounded-2xl border border-slate-200 p-4 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#9D1535]/20 mb-6"
            rows="4">Ringkasan untuk Course {{ $courseId }} - CLO {{ $activeClo }} (dummy)</textarea>

  <p id="cloSummaryHint" class="hidden -mt-4 mb-6 text-xs text-slate-400">
    Simpan untuk update ringkasan CLO ini.
  </p>

  <div class="flex justify-between items-center">
    <p class="text-sm font-semibold">Daftar Materi</p>

    {{-- link tambah materi ikut course + clo aktif --}}
    <a
      id="addMateriLink"
      href="{{ route('admin.materi.create', ['course' => $courseId]) }}?clo={{ $activeClo }}"
      class="px-4 py-2 rounded-xl bg-[#9D1535] text-white text-sm"
    >
      + Tambah Materi
    </a>
  </div>

</div>


@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", () => {
    const openBtn  = document.getElementById("openAddDosen");
    const modal    = document.getElementById("addDosenModal");
    const overlay  = document.getElementById("addDosenOverlay");
    const closeBtn = document.getElementById("closeAddDosen");

    if (!openBtn || !modal || !overlay || !closeBtn) return;

    const openModal = () => {
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    };

    const closeModal = () => {
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    };

    openBtn.addEventListener("click", openModal);
    closeBtn.addEventListener("click", closeModal);
    overlay.addEventListener("click", closeModal);

    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") closeModal();
    });
});
</script>


<script>
document.addEventListener("DOMContentLoaded", () => {
    const openBtn  = document.getElementById("openAddMateri");
    const modal    = document.getElementById("addMateriModal");
    const overlay  = document.getElementById("addMateriOverlay");
    const closeBtn = document.getElementById("closeAddMateri");

    if (!openBtn || !modal || !overlay || !closeBtn) return;

    const openModal = () => {
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    };

    const closeModal = () => {
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    };

    openBtn.addEventListener("click", openModal);
    closeBtn.addEventListener("click", closeModal);
    overlay.addEventListener("click", closeModal);

    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") closeModal();
    });
});
</script>

@endpush

@endsection