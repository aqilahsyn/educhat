<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Masuk - EduChat</title>

    {{-- Google Fonts Poppins --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Vite (agar Tailwind & JS masuk) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- Top bar --}}
    <header class="topbar">
        <div class="topbar-icon">
            &lt;/&gt;
        </div>
    </header>

    {{-- Main --}}
    <main class="page">
        <div class="auth-wrapper">
            {{-- Left illustration --}}
            <div class="illustration">
                <div class="illustration-inner">
                    {{-- Robot ilustrasi (bebas kamu ganti ke PNG kalau punya asset sendiri) --}}
                    <svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="200" cy="200" r="170" fill="#FDF2F2"/>
                        <rect x="140" y="150" width="120" height="150" rx="24" fill="#B8352E"/>
                        <circle cx="175" cy="205" r="16" fill="#0F172A"/>
                        <circle cx="225" cy="205" r="16" fill="#0F172A"/>
                        <circle cx="175" cy="203" r="8" fill="#22C55E"/>
                        <circle cx="225" cy="203" r="8" fill="#22C55E"/>
                        <path d="M 170 240 Q 200 255 230 240" stroke="#F9FAFB" stroke-width="4" fill="none" stroke-linecap="round"/>
                        <circle cx="155" cy="150" r="12" fill="#F97316"/>
                        <circle cx="245" cy="135" r="10" fill="#3B82F6"/>
                        <circle cx="215" cy="120" r="8" fill="#FACC15"/>
                    </svg>
                </div>
            </div>

            {{-- Right card --}}
            <section class="auth-card">
                <h1 class="auth-title">Masuk</h1>
                <p class="auth-subtitle">
                    Ayo masuk dan mulai jelajahi EduChat!
                </p>

                <form id="loginForm">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Masukkan Email Kampus"
                            required
                            autofocus
                        >
                        <div class="error" id="emailError"></div>
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan Kata Sandi"
                            required
                        >
                        <div class="error" id="passwordError"></div>
                    </div>

                    <button type="submit" class="btn-primary" id="submitBtn">
                        Masuk
                    </button>
                </form>

                <p class="helper-text">
                    Belum punya akun?
                    <a href="{{ route('register') }}">Buat Akun</a>
                </p>
            </section>
        </div>
    </main>

    {{-- PURE SLICING MODE: belum pakai backend, cuma redirect ke dashboard --}}
    <script>
        const form = document.getElementById('loginForm');
        const submitBtn = document.getElementById('submitBtn');

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            // TODO: nanti kalau backend sudah siap, ganti bagian ini dengan fetch('/api/login', ...)
            submitBtn.disabled = true;
            submitBtn.textContent = 'Masuk...';

            setTimeout(() => {
                // Simulasi "login berhasil" → langsung ke dashboard
                window.location.href = '/dashboard';
            }, 500);
        });
    </script>
</body>
</html>
