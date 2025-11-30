<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - EduChat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Font Poppins --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Vite (Tailwind + JS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#F4F7FB] font-sans text-slate-900 dark:bg-slate-950 dark:text-slate-100">

<div class="flex h-screen">
    {{-- LEFT ICON SIDEBAR --}}
    <aside class="flex flex-col items-center justify-between w-16 bg-white dark:bg-slate-900 shadow-[0_10px_35px_rgba(15,23,42,0.10)]">
        {{-- Top logo --}}
        <div class="mt-6 flex flex-col items-center gap-6">
            <div class="w-10 h-10 rounded-2xl bg-[#B8352E]/10 flex items-center justify-center text-xs font-semibold text-[#B8352E]">
                &lt;/&gt;
            </div>

            {{-- Nav icons --}}
            <nav class="flex flex-col items-center gap-4 mt-4">
                {{-- Learning Path (active) --}}
                <button
                    class="w-9 h-9 rounded-xl bg-[#B8352E] text-white flex items-center justify-center text-lg shadow-sm">
                    <span class="text-base">📚</span>
                </button>

                {{-- History --}}
                <a href="{{ route('history') }}"
                   class="w-9 h-9 rounded-xl flex items-center justify-center text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800">
                    <span class="text-lg">💬</span>
                </a>
            </nav>
        </div>

        {{-- Bottom icons: dark mode, language, profile --}}
        <div class="mb-6 flex flex-col items-center gap-4 text-slate-400 dark:text-slate-300">
            <button id="darkModeToggle"
                class="w-9 h-9 rounded-xl flex items-center justify-center hover:bg-slate-100 dark:hover:bg-slate-800">
                <span class="text-lg">🌙</span>
            </button>

            <button class="w-9 h-9 rounded-xl flex items-center justify-center hover:bg-slate-100 dark:hover:bg-slate-800">
                <span class="text-lg">🌐</span>
            </button>

            <div class="w-9 h-9 rounded-2xl bg-[#B8352E] flex items-center justify-center overflow-hidden">
                {{-- avatar placeholder --}}
                <span class="text-xs font-semibold text-white">AH</span>
            </div>
        </div>
    </aside>

    {{-- LEARNING PATH SIDEBAR --}}
    <aside class="w-80 bg-white dark:bg-slate-900 border-r border-slate-100 dark:border-slate-800 flex flex-col shadow-[0_20px_40px_rgba(15,23,42,0.05)]">
        {{-- Header --}}
        <div class="px-6 pt-6 pb-4 border-b border-slate-100 dark:border-slate-800">
            <p class="text-xs font-semibold tracking-[0.18em] uppercase text-[#B8352E]">
                Learning Path
            </p>
            <h1 class="mt-1 text-lg font-semibold text-slate-900 dark:text-slate-50">
                Mata Kuliah
            </h1>
        </div>

        {{-- Course list --}}
        <div class="flex-1 overflow-y-auto">
            @php
                // daftar mata kuliah
                $courses = [
                    'Algoritma Pemrograman',
                    'Algoritma Pemrograman (Lanjutan)',
                    'Analisis Kompleksitas Algoritma',
                    'Strategi Algoritma',
                ];

                // Daftar CLO per mata kuliah
                $courseClos = [
                    'Algoritma Pemrograman' => [
                        'CLO 1: Pengenalan materi dasar',
                        'CLO 2: Struktur kontrol & logika',
                        'CLO 3: Implementasi algoritma sederhana',
                    ],

                    'Algoritma Pemrograman (Lanjutan)' => [
                        'CLO 1: Rekursi',
                        'CLO 2: Sorting & Searching',
                    ],

                    'Analisis Kompleksitas Algoritma' => [
                        'CLO 1: Notasi Big-O',
                        'CLO 2: Analisis iteratif',
                        'CLO 3: Analisis rekursif',
                    ],

                    'Strategi Algoritma' => [
                        'CLO 1: Divide and Conquer',
                        'CLO 2: Greedy',
                        'CLO 3: Dynamic Programming',
                    ],
                ];
            @endphp

            @foreach($courses as $index => $course)
                <details class="group border-b border-slate-100 dark:border-slate-800" {{ $index === 0 ? 'open' : '' }}>
                    <summary class="flex items-center justify-between px-6 h-14 cursor-pointer hover:bg-slate-50 dark:hover:bg-slate-800/60">
                        <div class="flex items-center gap-3">
                            <div class="w-7 h-7 rounded-xl bg-[#B8352E]/10 flex items-center justify-center">
                                <span class="text-[13px] text-[#B8352E]">&lt;/&gt;</span>
                            </div>
                            <span class="text-sm font-medium text-slate-900 dark:text-slate-50">
                                {{ $course }}
                            </span>
                        </div>

                        <span class="ml-2 text-xs text-slate-400 dark:text-slate-500 transition-transform group-open:rotate-180">
                            ⌄
                        </span>
                    </summary>

                    {{-- CLO buttons --}}
                    <div class="px-6 pb-4 flex flex-col gap-2">
                        @foreach($courseClos[$course] ?? [] as $cloIndex => $cloName)
                            <a href="{{ route('course.clo', ['course' => $index + 1, 'clo' => $cloIndex + 1]) }}"
                               class="w-full flex items-center gap-3 text-sm font-medium
                                      text-[#B8352E] border border-slate-200 dark:border-slate-700
                                      rounded-xl px-4 py-2.5
                                      hover:bg-[#B8352E]/10 dark:hover:bg-[#B8352E]/20
                                      transition-colors">

                                @if ($cloIndex === 0)
                                    <span class="text-base">🎓</span>
                                @elseif ($cloIndex === 1)
                                    <span class="text-base">📘</span>
                                @elseif ($cloIndex === 2)
                                    <span class="text-base">💬</span>
                                @else
                                    <span class="text-base">⭐</span>
                                @endif

                                <span>{{ $cloName }}</span>
                            </a>
                        @endforeach
                    </div>
                </details>
            @endforeach
        </div>
    </aside>

    {{-- MAIN CONTENT --}}
    <main class="flex-1 flex items-center justify-center px-10">
        <div class="max-w-3xl w-full bg-white dark:bg-slate-900 rounded-[32px] shadow-[0_22px_60px_rgba(15,23,42,0.10)] px-16 py-12 flex flex-col items-center">
            <div class="w-[420px] max-w-full mb-8">
                <img
                    src="{{ asset('images/dashboard-empty.png') }}"
                    alt="Ilustrasi tidak ada chat"
                    class="w-full h-auto object-contain select-none"
                    onerror="this.style.display='none';"
                >
            </div>

            <div class="text-center">
                <p class="text-sm font-semibold text-[#B8352E]">
                    Tidak Ada Chat Saat Ini
                </p>
                <p class="mt-1 text-xs text-[#B8352E]">
                    Silakan pilih pembelajaran untuk melanjutkan percakapan
                </p>
            </div>
        </div>
    </main>
</div>

</body>
</html>
