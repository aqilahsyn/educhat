<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'EduChat')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- (Optional) Tailwind CDN buat cepat prototyping --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Kalau mau pakai CSS custom sendiri nanti: --}}
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}
</head>
<body class="bg-slate-50 min-h-screen">

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-white border-r border-slate-200 p-4">
            <div class="mb-8">
                <h1 class="font-semibold text-[#991B1B] text-xl">EduChat</h1>
                <p class="text-xs text-slate-500">Strategi Algoritma, AKA, Alpro</p>
            </div>

            <nav class="space-y-2 text-sm">
                <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-lg hover:bg-slate-100">
                    Dashboard
                </a>
                <a href="{{ route('history') }}" class="block px-3 py-2 rounded-lg hover:bg-slate-100">
                    Riwayat Chat
                </a>
                <a href="{{ route('profile') }}" class="block px-3 py-2 rounded-lg hover:bg-slate-100">
                    Profil
                </a>
            </nav>

            <form action="{{ route('logout') }}" method="POST" class="mt-8">
                @csrf
                <button class="text-sm text-red-600 hover:underline" type="submit">
                    Keluar
                </button>
            </form>
        </aside>

        {{-- Main content --}}
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>

    {{-- JS global frontend --}}
    <script src="/js/student.js"></script>

    @yield('scripts')
</body>
</html>
