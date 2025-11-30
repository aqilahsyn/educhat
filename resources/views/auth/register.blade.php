<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Buat Akun - EduChat</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #B8352E;
            --primary-dark: #8F2320;
            --bg-page: #F5F7FB;
            --text-main: #111827;
            --text-muted: #6B7280;
            --border-soft: #E5E7EB;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background-color: var(--bg-page);
            color: var(--text-main);
            display: flex;
            flex-direction: column;
        }

        .topbar {
            height: 64px;
            background-color: #FFFFFF;
            border-bottom: 1px solid #F3F4F6;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .topbar-icon {
            width: 34px;
            height: 34px;
            border-radius: 999px;
            border: 1.5px solid #111827;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .page {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 24px 56px;
        }

        .auth-wrapper {
            max-width: 1200px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 64px;
        }

        .illustration {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .illustration-inner {
            max-width: 420px;
            width: 100%;
        }

        .auth-card {
            flex: 1;
            max-width: 480px;
            background-color: #FFFFFF;
            border-radius: 24px;
            padding: 32px 36px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.08);
        }

        .auth-title {
            font-size: 24px;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 4px;
        }

        .auth-subtitle {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            font-size: 12px;
            font-weight: 500;
            color: #374151;
            display: block;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            border-radius: 999px;
            border: 1px solid var(--border-soft);
            padding: 11px 18px;
            font-size: 13px;
            outline: none;
            transition: border-color 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease;
            background-color: #F9FAFB;
        }

        input::placeholder {
            color: #9CA3AF;
            font-size: 12px;
        }

        input:focus {
            background-color: #FFFFFF;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(184, 53, 46, 0.2);
        }

        .btn-primary {
            width: 100%;
            border: none;
            border-radius: 999px;
            padding: 11px 18px;
            background-color: var(--primary);
            color: #FFFFFF;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            margin-top: 8px;
            transition: background-color 0.15s ease, transform 0.12s ease, box-shadow 0.12s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 8px 18px rgba(184, 53, 46, 0.3);
        }

        .btn-primary:active {
            transform: translateY(0);
            box-shadow: none;
        }

        .helper-text {
            margin-top: 18px;
            text-align: center;
            font-size: 12px;
            color: var(--text-muted);
        }

        .helper-text a {
            color: var(--primary);
            font-weight: 500;
            text-decoration: none;
        }

        .helper-text a:hover {
            text-decoration: underline;
        }

        .error {
            display: none;
            font-size: 11px;
            color: #DC2626;
            margin-top: 4px;
        }

        .error.show {
            display: block;
        }

        @media (max-width: 960px) {
            .auth-wrapper {
                flex-direction: column;
                gap: 32px;
            }

            .auth-card {
                width: 100%;
            }

            .page {
                padding-top: 24px;
            }
        }

        @media (max-width: 640px) {
            .auth-card {
                padding: 24px 20px;
                border-radius: 18px;
            }

            .illustration {
                display: none;
            }
        }
    </style>
</head>
<body>
    <header class="topbar">
        <div class="topbar-icon">
            &lt;/&gt;
        </div>
    </header>

    <main class="page">
        <div class="auth-wrapper">
            {{-- Left illustration --}}
            <div class="illustration">
                <div class="illustration-inner">
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
                <h1 class="auth-title">Buat Akun</h1>
                <p class="auth-subtitle">
                    Buat akun untuk dapat mengakses EduChat
                </p>

                <form id="registerForm">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Masukkan Nama Lengkap"
                            required
                        >
                        <div class="error" id="nameError"></div>
                    </div>

                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input
                            type="text"
                            id="nim"
                            name="nim"
                            placeholder="Masukkan NIM"
                            required
                        >
                        <div class="error" id="nimError"></div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Masukkan Email Kampus"
                            required
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

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Masukkan Konfirmasi Kata Sandi"
                            required
                        >
                        <div class="error" id="confirmError"></div>
                    </div>

                    <button type="submit" class="btn-primary" id="submitBtn">
                        Buat Akun
                    </button>
                </form>

                <p class="helper-text">
                    Sudah punya akun?
                    <a href="{{ route('login') }}">Masuk</a>
                </p>
            </section>
        </div>
    </main>

    {{-- PURE SLICING MODE: cuma redirect, belum pakai backend --}}
    <script>
        const form = document.getElementById('registerForm');
        const submitBtn = document.getElementById('submitBtn');
        const confirmError = document.getElementById('confirmError');

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            // Validasi sederhana dulu
            confirmError.classList.remove('show');
            const password = document.getElementById('password').value;
            const passwordConf = document.getElementById('password_confirmation').value;

            if (password !== passwordConf) {
                confirmError.textContent = 'Password tidak sama';
                confirmError.classList.add('show');
                return;
            }

            // TODO: nanti ganti ke fetch('/api/register', ...) kalau backend sudah siap
            submitBtn.disabled = true;
            submitBtn.textContent = 'Mendaftar...';

            setTimeout(() => {
                window.location.href = '/dashboard';
            }, 500);
        });
    </script>
</body>
</html>
