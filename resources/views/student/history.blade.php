{{-- resources/views/student/history.blade.php --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Percakapan - EduChat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Font Poppins --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#F4F7FB] font-sans text-slate-900 dark:bg-slate-950 dark:text-slate-100">

<div class="flex h-screen">

    {{-- 1) SIDEBAR IKON KIRI --}}
    <aside class="flex flex-col items-center justify-between w-16 bg-white dark:bg-slate-900 shadow-[0_10px_35px_rgba(15,23,42,0.10)]">
        <div class="mt-6 flex flex-col items-center gap-6">
            <div class="w-10 h-10 rounded-2xl bg-[#B8352E]/10 flex items-center justify-center text-xs font-semibold text-[#B8352E]">
                &lt;/&gt;
            </div>

            <nav class="flex flex-col items-center gap-4 mt-4">
                {{-- Learning Path --}}
                <a href="{{ route('dashboard') }}"
                   class="w-9 h-9 rounded-xl flex items-center justify-center text-lg text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800">
                    <span class="text-base">📚</span>
                </a>

                {{-- History (AKTIF) --}}
                <a href="{{ route('history') }}"
                   class="w-9 h-9 rounded-xl flex items-center justify-center text-lg bg-[#B8352E] text-white shadow-sm">
                    <span class="text-base">💬</span>
                </a>
            </nav>
        </div>

        <div class="mb-6 flex flex-col items-center gap-4 text-slate-400 dark:text-slate-300">
            <button id="darkModeToggle"
                    class="w-9 h-9 rounded-xl flex items-center justify-center hover:bg-slate-100 dark:hover:bg-slate-800">
                <span class="text-lg">🌙</span>
            </button>
            <button class="w-9 h-9 rounded-xl flex items-center justify-center hover:bg-slate-100 dark:hover:bg-slate-800">
                <span class="text-lg">🌐</span>
            </button>

            <div class="w-9 h-9 rounded-2xl bg-[#B8352E] flex items-center justify-center overflow-hidden">
                <span class="text-xs font-semibold text-white">AH</span>
            </div>
        </div>
    </aside>

    {{-- 2) SIDEBAR KHUSUS HISTORY --}}
    <aside class="w-80 bg-white dark:bg-slate-900 border-r border-slate-100 dark:border-slate-800 flex flex-col">
        <div class="px-6 pt-6 pb-4 border-b border-slate-100 dark:border-slate-800">
            <h1 class="text-sm font-semibold text-[#B8352E]">
                Riwayat Percakapan
            </h1>
        </div>

        <div class="flex-1 overflow-y-auto">
            @foreach($sessions as $session)
                @php
                    $active = $activeSession['id'] === $session['id'];
                @endphp

                <a href="{{ route('history.show', $session['id']) }}"
                   class="flex items-center gap-3 px-6 py-4 border-b border-slate-100 dark:border-slate-800
                          {{ $active ? 'bg-[#B8352E] text-white' : 'hover:bg-slate-50 dark:hover:bg-slate-800/60' }}">
                    <div class="w-7 h-7 rounded-full flex items-center justify-center
                                {{ $active ? 'bg-white/15' : 'bg-[#B8352E]/10' }}">
                        <span class="text-xs {{ $active ? 'text-white' : 'text-[#B8352E]' }}">💬</span>
                    </div>

                    <div class="flex flex-col">
                        <span class="text-sm font-medium {{ $active ? 'text-white' : 'text-slate-900 dark:text-slate-50' }}">
                            {{ $session['title'] }}
                        </span>
                        <span class="text-xs {{ $active ? 'text-white/80' : 'text-slate-500 dark:text-slate-400' }}">
                            {{ $session['subtitle'] }}
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </aside>

    {{-- 3) KOLOM TENGAH: CHAT --}}
    <main class="flex-1 flex flex-col border-r border-slate-100 dark:border-slate-800 px-8 py-6">
        {{-- Header chat --}}
        <header class="flex items-center justify-between bg-white dark:bg-slate-900 rounded-3xl px-6 py-4 mb-4 shadow-sm border border-slate-100 dark:border-slate-800">
            <div class="flex items-center gap-3">
                <a href="{{ route('history') }}"
                   class="w-8 h-8 rounded-full flex items-center justify-center hover:bg-slate-100 dark:hover:bg-slate-800">
                    <span class="text-lg">&lt;</span>
                </a>

                <div class="flex flex-col">
                    <div class="flex items-center gap-2">
                        <span class="text-[#B8352E] text-lg">&lt;/&gt;</span>
                        <p class="text-sm font-semibold text-slate-900 dark:text-slate-50">
                            {{ $activeSession['title'] }} - {{ $activeSession['course'] }}
                        </p>
                    </div>
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        CLO {{ $activeSession['clo'] }}
                    </p>
                </div>
            </div>

            <button
                id="infoToggleBtn"
                class="w-9 h-9 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 flex items-center justify-center hover:bg-slate-50 dark:hover:bg-slate-800"
                type="button">
                <span class="text-sm">📘</span>
            </button>
        </header>

        {{-- Daftar pesan --}}
        <div class="flex-1 overflow-y-auto space-y-4 pr-2 pt-2">
            @forelse($messages as $message)
                @if($message['role'] === 'bot')
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-full bg-[#B8352E] flex items-center justify-center text-white text-sm">
                            🤖
                        </div>
                        <div class="max-w-xl rounded-2xl bg-white dark:bg-slate-900 shadow-sm px-4 py-3 text-sm text-slate-800 dark:text-slate-100">
                            <p>{{ $message['content'] }}</p>
                        </div>
                    </div>
                @else
                    <div class="flex items-start justify-end gap-3">
                        <div class="max-w-xl rounded-2xl bg-[#B8352E] text-white shadow-sm px-4 py-3 text-sm">
                            <p>{{ $message['content'] }}</p>
                        </div>
                        <div class="w-9 h-9 rounded-full bg-slate-300 flex items-center justify-center text-xs font-semibold">
                            AH
                        </div>
                    </div>
                @endif
            @empty
                <p class="text-xs text-slate-400">Belum ada percakapan untuk sesi ini.</p>
            @endforelse
        </div>

        {{-- Suggest + input --}}
        <div class="mt-4">
            <div class="flex flex-wrap gap-3 mb-3">
                <button
                    class="px-5 py-2 rounded-full text-xs font-medium bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 shadow-sm hover:bg-slate-50 dark:hover:bg-slate-800">
                    Suggest satu
                </button>
                <button
                    class="px-5 py-2 rounded-full text-xs font-medium bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 shadow-sm hover:bg-slate-50 dark:hover:bg-slate-800">
                    Suggest satu
                </button>
                <button
                    class="px-5 py-2 rounded-full text-xs font-medium bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 shadow-sm hover:bg-slate-50 dark:hover:bg-slate-800">
                    Suggest satu
                </button>
            </div>

            <div
                class="bg-white dark:bg-slate-900 rounded-[32px] shadow-[0_12px_40px_rgba(15,23,42,0.10)] px-5 py-3 flex items-end gap-3">
                <textarea
                    class="flex-1 resize-none border-none focus:ring-0 focus:outline-none text-sm bg-transparent placeholder:text-slate-400 dark:placeholder:text-slate-500"
                    rows="2"
                    placeholder="Tanya pertanyaan disini..."></textarea>

                <button
                    type="button"
                    class="w-10 h-10 rounded-full bg-[#B8352E] flex items-center justify-center text-white shadow-md hover:bg-[#8f251f]">
                    <span class="text-sm">↑</span>
                </button>
            </div>
        </div>
    </main>

    {{-- 4) PANEL KANAN: MATA KULIAH --}}
    <aside
        id="cloInfoPanel"
        class="w-80 bg-white dark:bg-slate-900 rounded-3xl border border-slate-100 dark:border-slate-800 shadow-sm p-6">
        <h2 class="text-sm font-semibold text-[#B8352E] mb-3">
            Mata Kuliah
        </h2>

        <div class="text-xs leading-relaxed text-slate-700 dark:text-slate-300 space-y-3">
            <p>{{ $infoText }}</p>
            {{-- kalau mau, bisa tambah paragraf dummy lain --}}
        </div>
    </aside>

</div>

</body>
</html>
