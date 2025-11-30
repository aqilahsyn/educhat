<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Strategi Algoritma - EduChat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        :root {
            --primary: #B8352E;
            --primary-dark: #8F2320;
            --primary-soft: #FDF2F2;
            --bg-page: #F5F7FB;
            --text-main: #111827;
            --text-muted: #6B7280;
            --border-soft: #E5E7EB;
            --card-bg: #FFFFFF;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            min-height: 100vh;
            background-color: var(--bg-page);
            color: var(--text-main);
            display: flex;
            flex-direction: column;
        }

        /* Topbar */
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

        /* Layout utama */
        .page {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 20px;
            gap: 14px;
        }

        .breadcrumbs {
            font-size: 11px;
            color: var(--text-muted);
        }

        .breadcrumbs a {
            color: var(--primary);
            text-decoration: none;
        }

        .breadcrumbs span {
            margin: 0 6px;
        }

        .header-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .header-left {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .eyebrow {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.14em;
            color: var(--primary);
        }

        .course-title-row {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .course-title {
            font-size: 18px;
            font-weight: 600;
        }

        .course-badge {
            font-size: 11px;
            padding: 4px 10px;
            border-radius: 999px;
            background-color: var(--primary-soft);
            color: var(--primary);
        }

        .clo-title {
            font-size: 13px;
            color: var(--text-muted);
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .toggle-sidebar-btn {
            border-radius: 999px;
            border: 1px solid var(--border-soft);
            background-color: #FFFFFF;
            font-size: 11px;
            padding: 6px 10px;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            color: var(--text-muted);
        }

        .toggle-sidebar-btn span.icon {
            width: 18px;
            height: 18px;
            border-radius: 999px;
            background-color: var(--primary-soft);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            color: var(--primary);
        }

        .header-pill {
            font-size: 11px;
            padding: 4px 10px;
            border-radius: 999px;
            background-color: #ECFDF3;
            color: #166534;
        }

        /* Konten utama */
        .content {
            flex: 1;
            display: flex;
            gap: 16px;
            min-height: 0;
        }

        .chat-column {
            flex: 1.6;
            background-color: #FFFFFF;
            border-radius: 24px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .chat-header {
            padding: 14px 18px;
            border-bottom: 1px solid #F3F4F6;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .chat-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .chat-title {
            font-size: 13px;
            font-weight: 500;
        }

        .chat-subtitle {
            font-size: 11px;
            color: var(--text-muted);
        }

        .chat-status {
            font-size: 11px;
            padding: 3px 9px;
            border-radius: 999px;
            background-color: #EFF6FF;
            color: #1D4ED8;
        }

        .chat-body {
            flex: 1;
            padding: 14px 18px;
            overflow-y: auto;
            background-image: radial-gradient(circle at 0 0, rgba(184,53,46,0.035) 0, transparent 40%),
                              radial-gradient(circle at 100% 100%, rgba(184,53,46,0.035) 0, transparent 40%);
        }

        .message-group {
            margin-bottom: 14px;
        }

        .msg-meta {
            font-size: 10px;
            color: #9CA3AF;
            margin-bottom: 4px;
        }

        .msg-row {
            display: flex;
            align-items: flex-end;
            gap: 6px;
        }

        .msg-avatar {
            width: 26px;
            height: 26px;
            border-radius: 999px;
            background-color: var(--primary-soft);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            flex-shrink: 0;
        }

        .msg-avatar-user {
            background-color: #E5E7EB;
        }

        .msg-avatar span {
            color: var(--primary);
        }

        .msg-bubble {
            max-width: 80%;
            border-radius: 16px;
            padding: 9px 11px;
            font-size: 12px;
            line-height: 1.4;
        }

        .msg-bubble-bot {
            background-color: #F9FAFB;
            border: 1px solid #E5E7EB;
        }

        .msg-bubble-user {
            background-color: var(--primary);
            color: #FFFFFF;
            margin-left: auto;
            border-bottom-right-radius: 4px;
        }

        .msg-row.user {
            justify-content: flex-end;
        }

        .msg-row.user .msg-avatar {
            order: 2;
        }

        .msg-row.user .msg-bubble {
            order: 1;
        }

        .typing-indicator {
            display: inline-flex;
            gap: 3px;
        }

        .typing-dot {
            width: 4px;
            height: 4px;
            border-radius: 999px;
            background-color: #9CA3AF;
            opacity: 0.8;
        }

        .chat-footer {
            border-top: 1px solid #F3F4F6;
            padding: 10px 12px;
            background-color: #FFFFFF;
        }

        .input-wrapper {
            display: flex;
            align-items: flex-end;
            gap: 8px;
        }

        .input-area {
            flex: 1;
            background-color: #F9FAFB;
            border-radius: 18px;
            border: 1px solid #E5E7EB;
            padding: 8px 10px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .input-area textarea {
            border: none;
            resize: none;
            background: transparent;
            font-size: 12px;
            outline: none;
            max-height: 80px;
        }

        .input-helper {
            font-size: 10px;
            color: #9CA3AF;
            display: flex;
            justify-content: space-between;
            gap: 6px;
        }

        .send-btn {
            border-radius: 999px;
            border: none;
            background-color: var(--primary);
            color: #FFFFFF;
            font-size: 13px;
            padding: 8px 13px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            flex-shrink: 0;
        }

        .send-btn span.icon {
            font-size: 12px;
        }

        /* Sidebar kanan (materi) */
        .sidebar-right {
            width: 280px;
            background-color: #FFFFFF;
            border-radius: 24px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
            padding: 16px 18px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .sidebar-right.hidden {
            display: none;
        }

        .sr-tag {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.14em;
            color: var(--primary);
        }

        .sr-title {
            font-size: 14px;
            font-weight: 600;
        }

        .sr-desc {
            font-size: 11px;
            color: var(--text-muted);
        }

        .sr-section-title {
            font-size: 12px;
            font-weight: 600;
            margin-top: 8px;
        }

        .sr-list {
            margin-top: 4px;
            border-radius: 14px;
            background-color: #F9FAFB;
            padding: 8px 9px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .sr-item {
            border-radius: 12px;
            padding: 7px 8px;
            background-color: #FFFFFF;
            border: 1px solid #E5E7EB;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .sr-item-title {
            font-size: 11px;
            font-weight: 500;
        }

        .sr-item-sub {
            font-size: 10px;
            color: var(--text-muted);
        }

        .sr-chip-row {
            display: flex;
            flex-wrap: wrap;
            gap: 4px;
            margin-top: 6px;
        }

        .sr-chip {
            font-size: 10px;
            padding: 3px 7px;
            border-radius: 999px;
            background-color: var(--primary-soft);
            color: var(--primary-dark);
        }

        .sr-note {
            font-size: 10px;
            color: #9CA3AF;
        }

        @media (max-width: 1024px) {
            .content {
                flex-direction: column;
            }

            .sidebar-right {
                width: 100%;
                order: -1;
            }

            .header-row {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 640px) {
            .page {
                padding: 16px;
            }

            .chat-column,
            .sidebar-right {
                border-radius: 20px;
            }

            .chat-header {
                padding: 10px 12px;
            }

            .chat-body {
                padding: 10px 12px;
            }
        }
    </style>
</head>
<body>
    @php
        // Fallback nama kalau route hanya kirim id
        $courseName = 'Strategi Algoritma';
        $cloName = 'CLO 1 · Brute Force & Divide and Conquer';
        $isHistory = isset($session);
    @endphp

    {{-- Topbar --}}
    <header class="topbar">
        <div class="topbar-icon">
            &lt;/&gt;
        </div>
    </header>

    <main class="page">
        {{-- Breadcrumbs --}}
        <nav class="breadcrumbs">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <span>/</span>
            <a href="{{ route('course.show', $course ?? 1) }}">Strategi Algoritma</a>
            <span>/</span>
            <span>{{ $isHistory ? 'Riwayat Chat' : 'CLO 1' }}</span>
        </nav>

        {{-- Header --}}
        <div class="header-row">
            <div class="header-left">
                <span class="eyebrow">{{ $isHistory ? 'Riwayat percakapan' : 'CLO Strategi Algoritma' }}</span>

                <div class="course-title-row">
                    <h1 class="course-title">{{ $courseName }}</h1>
                    <span class="course-badge">{{ $cloName }}</span>
                </div>

                <p class="clo-title">
                    Tanyakan apa saja tentang materi brute force dan divide & conquer, dari konsep dasar sampai contoh soal.
                </p>
            </div>

            <div class="header-right">
                <button type="button" class="toggle-sidebar-btn" id="toggleSidebarBtn">
                    <span class="icon">≡</span>
                    Materi & contoh soal
                </button>

                <div class="header-pill">
                    Mode {{ $isHistory ? 'Riwayat' : 'Belajar' }}
                </div>
            </div>
        </div>

        {{-- Konten --}}
        <section class="content">
            {{-- Kolom chat --}}
            <section class="chat-column">
                <header class="chat-header">
                    <div class="chat-info">
                        <div class="chat-title">
                            {{ $isHistory ? 'Percakapan sebelumnya' : 'Tanyakan apa yang belum kamu pahami' }}
                        </div>
                        <div class="chat-subtitle">
                            Gunakan bahasa santai. Kamu bisa kirim potongan soal, kode, atau minta dijelasin pelan-pelan.
                        </div>
                    </div>

                    <div class="chat-status">
                        🎓 EduChat • Strategi Algoritma
                    </div>
                </header>

                <div class="chat-body" id="chatBody">
                    {{-- Dummy messages --}}
                </div>

                <footer class="chat-footer">
                    <form id="chatForm">
                        <div class="input-wrapper">
                            <div class="input-area">
                                <textarea
                                    id="chatInput"
                                    rows="1"
                                    placeholder="Tanyakan contoh soal brute force, minta penjelasan step-by-step, atau kirim kode yang ingin kamu diskusikan..."
                                ></textarea>
                                <div class="input-helper">
                                    <span>Tips: makin spesifik pertanyaannya, makin jelas jawabannya ✨</span>
                                    <span>Enter untuk kirim · Shift+Enter baris baru</span>
                                </div>
                            </div>

                            <button type="submit" class="send-btn">
                                <span class="icon">➤</span>
                                Kirim
                            </button>
                        </div>
                    </form>
                </footer>
            </section>

            {{-- Sidebar kanan: materi --}}
            <aside class="sidebar-right" id="sidebarRight">
                <div>
                    <div class="sr-tag">Materi CLO 1</div>
                    <div class="sr-title">Brute Force & Divide and Conquer</div>
                    <p class="sr-desc">
                        Gunakan panel ini untuk membuka materi ringkas dan contoh soal yang selaras dengan percakapanmu.
                    </p>
                </div>

                <div>
                    <div class="sr-section-title">Ringkasan materi</div>
                    <div class="sr-list">
                        <div class="sr-item">
                            <div class="sr-item-title">Konsep Brute Force</div>
                            <div class="sr-item-sub">
                                Menyelesaikan masalah dengan mencoba semua kemungkinan secara sistematis.
                            </div>
                        </div>
                        <div class="sr-item">
                            <div class="sr-item-title">Divide and Conquer</div>
                            <div class="sr-item-sub">
                                Membagi masalah menjadi sub-masalah lebih kecil, menyelesaikan, lalu menggabungkannya.
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="sr-section-title">Contoh soal</div>
                    <div class="sr-list">
                        <div class="sr-item">
                            <div class="sr-item-title">Pencarian maksimum (Brute Force)</div>
                            <div class="sr-item-sub">
                                Diberikan array A berisi n bilangan, cari nilai maksimum menggunakan brute force.
                            </div>
                        </div>
                        <div class="sr-item">
                            <div class="sr-item-title">Pencarian elemen pada array terurut (Binary Search)</div>
                            <div class="sr-item-sub">
                                Contoh penerapan divide and conquer pada array terurut.
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="sr-section-title">Tag materi</div>
                    <div class="sr-chip-row">
                        <span class="sr-chip">Brute Force</span>
                        <span class="sr-chip">Divide & Conquer</span>
                        <span class="sr-chip">Analisis waktu</span>
                        <span class="sr-chip">Pseudocode</span>
                    </div>
                </div>

                <p class="sr-note">
                    Nanti ketika backend sudah siap, daftar materi di panel ini bisa diisi dari file yang diupload dosen untuk CLO ini.
                </p>
            </aside>
        </section>
    </main>

    <script>
        // Dummy chat messages
        const initialMessages = [
            {
                id: 1,
                from: 'bot',
                text: 'Halo! 👋 Aku EduChat. Di CLO ini kita fokus ke brute force dan divide & conquer. Ada bagian mana yang paling bikin kamu bingung?',
                time: '19:01'
            },
            {
                id: 2,
                from: 'user',
                text: 'Kak, aku masih bingung bedanya brute force sama divide and conquer itu apa ya? Soalnya kelihatannya sama-sama nyari solusi.',
                time: '19:02'
            },
            {
                id: 3,
                from: 'bot',
                text: 'Pertanyaan bagus banget. Singkatnya:\n\n• Brute force: coba semua kemungkinan sampai ketemu jawaban.\n• Divide and conquer: bagi masalah jadi bagian-bagian kecil, selesaikan, lalu gabungkan.\n\nMau mulai dari contoh brute force dulu atau divide and conquer dulu?',
                time: '19:02'
            }
        ];

        const chatBody = document.getElementById('chatBody');
        const chatForm = document.getElementById('chatForm');
        const chatInput = document.getElementById('chatInput');
        const sidebarRight = document.getElementById('sidebarRight');
        const toggleSidebarBtn = document.getElementById('toggleSidebarBtn');

        let messages = [...initialMessages];

        function renderMessages() {
            chatBody.innerHTML = '';

            messages.forEach(msg => {
                const group = document.createElement('div');
                group.className = 'message-group';

                const meta = document.createElement('div');
                meta.className = 'msg-meta';
                meta.textContent = (msg.from === 'bot' ? 'EduChat' : 'Kamu') + ' • ' + msg.time;

                const row = document.createElement('div');
                row.className = 'msg-row ' + (msg.from === 'user' ? 'user' : '');

                const avatar = document.createElement('div');
                avatar.className = 'msg-avatar ' + (msg.from === 'user' ? 'msg-avatar-user' : '');
                avatar.innerHTML = msg.from === 'bot' ? '<span>EC</span>' : '👤';

                const bubble = document.createElement('div');
                bubble.className = 'msg-bubble ' + (msg.from === 'user' ? 'msg-bubble-user' : 'msg-bubble-bot');
                bubble.innerHTML = msg.text.replace(/\n/g, '<br>');

                row.appendChild(avatar);
                row.appendChild(bubble);

                group.appendChild(meta);
                group.appendChild(row);

                chatBody.appendChild(group);
            });

            chatBody.scrollTop = chatBody.scrollHeight;
        }

        chatForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const text = chatInput.value.trim();
            if (!text) return;

            const now = new Date();
            const time = now.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit'
            });

            messages.push({
                id: Date.now(),
                from: 'user',
                text,
                time
            });

            chatInput.value = '';
            renderMessages();

            // Tambah "dummy" balasan EduChat (slicing saja)
            setTimeout(() => {
                messages.push({
                    id: Date.now() + 1,
                    from: 'bot',
                    text: 'Oke, kita bahas pelan-pelan ya 👇\n\n' +
                          '1. Aku akan jelaskan konsep dasarnya dulu.\n' +
                          '2. Habis itu kita lihat satu contoh soal yang mirip dengan pertanyaanmu.\n\n' +
                          'Ini cuma simulasi. Nanti kalau backend sudah siap, jawaban di sini akan diisi dari model AI / chatbot beneran.',
                    time: new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' })
                });
                renderMessages();
            }, 700);
        });

        chatInput.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                chatForm.dispatchEvent(new Event('submit'));
            }
        });

        toggleSidebarBtn.addEventListener('click', function () {
            sidebarRight.classList.toggle('hidden');
        });

        // First render
        renderMessages();
    </script>
</body>
</html>
