<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Chat - EduChat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        :root {
            --primary: #B8352E;
            --primary-soft: #FDF2F2;
            --primary-dark: #8F2320;
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

        /* Page */
        .page {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
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
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .header-main {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .eyebrow {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.14em;
            color: var(--primary);
        }

        .page-title {
            font-size: 20px;
            font-weight: 600;
        }

        .page-subtitle {
            font-size: 12px;
            color: var(--text-muted);
        }

        .header-actions {
            display: flex;
            flex-direction: column;
            gap: 8px;
            align-items: flex-end;
        }

        .summary-pill {
            font-size: 11px;
            padding: 4px 10px;
            border-radius: 999px;
            background-color: #EEF2FF;
            color: #4F46E5;
        }

        .back-link {
            font-size: 11px;
            color: var(--text-muted);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .back-link span {
            font-size: 13px;
        }

        /* Filter bar + layout */
        .content {
            flex: 1;
            display: flex;
            gap: 16px;
            min-height: 0;
        }

        .filter-column {
            width: 240px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .main-column {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 10px;
            min-height: 0;
        }

        .card {
            background-color: #FFFFFF;
            border-radius: 24px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
            padding: 18px 18px;
        }

        .card--soft {
            border-radius: 20px;
            box-shadow: 0 10px 26px rgba(15, 23, 42, 0.06);
        }

        .section-title {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .section-subtitle {
            font-size: 11px;
            color: var(--text-muted);
        }

        /* Filter card */
        .filter-group {
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .filter-label {
            font-size: 11px;
            font-weight: 500;
            color: #374151;
        }

        .select {
            width: 100%;
            border-radius: 999px;
            border: 1px solid var(--border-soft);
            background-color: #F9FAFB;
            padding: 7px 11px;
            font-size: 11px;
            color: var(--text-main);
            outline: none;
        }

        .pill-filter-row {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .pill-filter {
            font-size: 10px;
            padding: 4px 8px;
            border-radius: 999px;
            border: 1px solid #E5E7EB;
            background-color: #FFFFFF;
            color: var(--text-muted);
            cursor: pointer;
        }

        .pill-filter--active {
            background-color: var(--primary-soft);
            border-color: var(--primary);
            color: var(--primary-dark);
        }

        .small-note {
            font-size: 10px;
            color: #9CA3AF;
            margin-top: 8px;
        }

        /* List riwayat */
        .history-header-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 6px;
        }

        .count-label {
            font-size: 11px;
            color: var(--text-muted);
        }

        .sort-select {
            border-radius: 999px;
            border: 1px solid #E5E7EB;
            background-color: #F9FAFB;
            padding: 5px 10px;
            font-size: 10px;
            color: var(--text-muted);
        }

        .history-list {
            margin-top: 8px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            max-height: calc(100vh - 240px);
            overflow-y: auto;
        }

        .history-item {
            border-radius: 18px;
            padding: 10px 12px;
            background-color: #F9FAFB;
            border: 1px solid #E5E7EB;
            display: flex;
            justify-content: space-between;
            gap: 10px;
            cursor: pointer;
            transition: background-color 0.15s ease, transform 0.12s ease, box-shadow 0.12s ease;
        }

        .history-item:hover {
            background-color: #F3F4F6;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(15, 23, 42, 0.06);
        }

        .history-main {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .history-top-row {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .history-course {
            font-size: 11px;
            font-weight: 600;
        }

        .history-clo-pill {
            font-size: 10px;
            padding: 3px 8px;
            border-radius: 999px;
            background-color: var(--primary-soft);
            color: var(--primary-dark);
        }

        .history-snippet {
            font-size: 11px;
            color: var(--text-muted);
        }

        .history-meta-row {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 10px;
            color: #9CA3AF;
        }

        .dot {
            width: 4px;
            height: 4px;
            border-radius: 999px;
            background-color: #D1D5DB;
        }

        .history-right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: space-between;
            gap: 6px;
        }

        .status-badge {
            font-size: 10px;
            padding: 3px 8px;
            border-radius: 999px;
        }

        .status-badge--ongoing {
            background-color: #ECFEFF;
            color: #0891B2;
        }

        .status-badge--completed {
            background-color: #ECFDF3;
            color: #16A34A;
        }

        .status-badge--draft {
            background-color: #FEF9C3;
            color: #A16207;
        }

        .open-link {
            font-size: 10px;
            color: var(--primary-dark);
            display: inline-flex;
            align-items: center;
            gap: 4px;
            text-decoration: none;
        }

        .open-link span {
            font-size: 12px;
        }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 28px 16px;
            border-radius: 18px;
            background-color: #F9FAFB;
            border: 1px dashed #E5E7EB;
        }

        .empty-icon {
            width: 60px;
            height: 60px;
            border-radius: 18px;
            background-color: var(--primary-soft);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
        }

        .empty-icon svg {
            width: 34px;
            height: 34px;
        }

        .empty-title {
            font-size: 13px;
            font-weight: 500;
        }

        .empty-text {
            font-size: 11px;
            color: var(--text-muted);
            margin-top: 4px;
        }

        .empty-pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 9px;
            border-radius: 999px;
            background-color: #EEF2FF;
            color: #4F46E5;
            font-size: 10px;
            margin-top: 8px;
        }

        @media (max-width: 960px) {
            .content {
                flex-direction: column;
            }

            .filter-column {
                width: 100%;
            }
        }

        @media (max-width: 640px) {
            .page {
                padding: 16px;
            }

            .card {
                border-radius: 20px;
            }
        }
    </style>
</head>
<body>
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
            <span>Riwayat Chat</span>
        </nav>

        {{-- Header --}}
        <header class="header-row">
            <div class="header-main">
                <span class="eyebrow">Riwayat percakapan</span>
                <h1 class="page-title">Histori percakapan Anda di EduChat</h1>
                <p class="page-subtitle">
                    Lanjutkan percakapan yang tertunda atau lihat kembali penjelasan yang sudah pernah didapatkan.
                </p>
            </div>

            <div class="header-actions">
                <span class="summary-pill" id="summaryPill">
                    0 percakapan tersimpan
                </span>
                <a href="{{ route('dashboard') }}" class="back-link">
                    <span>←</span>
                    Kembali ke Dashboard
                </a>
            </div>
        </header>

        {{-- Content --}}
        <section class="content">
            {{-- Filter column --}}
            <aside class="filter-column">
                <section class="card card--soft">
                    <h2 class="section-title">Filter percakapan</h2>
                    <p class="section-subtitle">
                        Saring berdasarkan mata kuliah, CLO, atau status percakapan.
                    </p>

                    <div class="filter-group">
                        <div>
                            <label class="filter-label" for="filterCourse">Mata kuliah</label>
                            <select id="filterCourse" class="select">
                                <option value="all">Semua mata kuliah</option>
                            </select>
                        </div>

                        <div>
                            <label class="filter-label">Status</label>
                            <div class="pill-filter-row">
                                <button type="button" class="pill-filter pill-filter--active" data-status="all">
                                    Semua
                                </button>
                                <button type="button" class="pill-filter" data-status="ongoing">
                                    Sedang berlangsung
                                </button>
                                <button type="button" class="pill-filter" data-status="completed">
                                    Selesai
                                </button>
                                <button type="button" class="pill-filter" data-status="draft">
                                    Draft
                                </button>
                            </div>
                        </div>
                    </div>

                    <p class="small-note">
                        Nanti ketika backend sudah siap, filter ini bisa mengambil data langsung dari riwayat percakapan di database.
                    </p>
                </section>
            </aside>

            {{-- Main list --}}
            <section class="main-column">
                <section class="card">
                    <div class="history-header-row">
                        <div>
                            <h2 class="section-title">Daftar riwayat chat</h2>
                            <p class="count-label" id="historyCountText">
                                Menampilkan 0 percakapan
                            </p>
                        </div>

                        <select id="sortSelect" class="sort-select">
                            <option value="recent">Paling baru</option>
                            <option value="oldest">Paling lama</option>
                        </select>
                    </div>

                    {{-- Empty state --}}
                    <div class="empty-state" id="emptyState">
                        <div class="empty-icon">
                            <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                                <rect x="14" y="20" width="36" height="26" rx="6" fill="#B8352E"/>
                                <circle cx="24" cy="30" r="4" fill="#F9FAFB"/>
                                <circle cx="40" cy="30" r="4" fill="#F9FAFB"/>
                                <path d="M22 36 Q 32 40 42 36" stroke="#F9FAFB" stroke-width="2.5" fill="none" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <p class="empty-title">Belum ada percakapan tersimpan</p>
                        <p class="empty-text">
                            Riwayat chat akan muncul di sini setelah Anda memulai percakapan di salah satu CLO mata kuliah.
                        </p>
                        <div class="empty-pill">
                            <span>🎓</span>
                            <span>Mulai dari Dashboard & pilih mata kuliah</span>
                        </div>
                    </div>

                    {{-- History list --}}
                    <div class="history-list" id="historyList" style="display:none;">
                        {{-- Diisi JS --}}
                    </div>
                </section>
            </section>
        </section>
    </main>

    <script>
        // Dummy data riwayat chat
        const HISTORY_SESSIONS = [
            {
                id: 101,
                courseId: 1,
                courseName: 'Strategi Algoritma',
                cloLabel: 'CLO 1 · Brute Force & Divide and Conquer',
                lastQuestion: 'Kak, bisa jelasin lagi step divide and conquer untuk binary search?',
                lastAt: 'Hari ini · 18.42',
                status: 'ongoing', // ongoing | completed | draft
                messagesCount: 14
            },
            {
                id: 102,
                courseId: 1,
                courseName: 'Strategi Algoritma',
                cloLabel: 'CLO 2 · Analisis Kompleksitas',
                lastQuestion: 'Kalau ada dua algoritma O(n²) dan O(n log n), kapan yang n² masih oke dipakai?',
                lastAt: 'Kemarin · 21.10',
                status: 'completed',
                messagesCount: 9
            },
            {
                id: 201,
                courseId: 2,
                courseName: 'Analisis Kompleksitas Algoritma',
                cloLabel: 'CLO 1 · Notasi Kompleksitas',
                lastQuestion: 'Bedanya Big-O sama Big-Theta itu apa ya, secara intuitif?',
                lastAt: '3 hari lalu · 19.05',
                status: 'completed',
                messagesCount: 7
            },
            {
                id: 301,
                courseId: 3,
                courseName: 'Algoritma & Pemrograman',
                cloLabel: 'CLO 2 · Implementasi Algoritma',
                lastQuestion: 'Aku lagi nyusun pseudocode untuk program hitung rata-rata, bisa dicek?',
                lastAt: 'Minggu lalu · 16.22',
                status: 'draft',
                messagesCount: 3
            }
        ];

        const filterCourseSelect = document.getElementById('filterCourse');
        const statusFilters = document.querySelectorAll('.pill-filter');
        const sortSelect = document.getElementById('sortSelect');

        const summaryPill = document.getElementById('summaryPill');
        const historyCountText = document.getElementById('historyCountText');
        const emptyState = document.getElementById('emptyState');
        const historyList = document.getElementById('historyList');

        let selectedCourse = 'all';
        let selectedStatus = 'all';
        let selectedSort = 'recent';

        // Populate filter course options
        function populateCourseFilter() {
            const uniqueCourses = Array.from(new Set(HISTORY_SESSIONS.map(s => s.courseId)))
                .map(id => ({
                    id,
                    name: HISTORY_SESSIONS.find(s => s.courseId === id)?.courseName || `Course ${id}`
                }));

            uniqueCourses.forEach(c => {
                const opt = document.createElement('option');
                opt.value = String(c.id);
                opt.textContent = c.name;
                filterCourseSelect.appendChild(opt);
            });
        }

        function applyFilters() {
            let sessions = [...HISTORY_SESSIONS];

            if (selectedCourse !== 'all') {
                sessions = sessions.filter(s => String(s.courseId) === String(selectedCourse));
            }

            if (selectedStatus !== 'all') {
                sessions = sessions.filter(s => s.status === selectedStatus);
            }

            if (selectedSort === 'recent') {
                sessions.reverse(); // data dummy dari terbaru ke lama atau sebaliknya bebas, ini simple
            }

            renderHistory(sessions);
        }

        function renderHistory(sessions) {
            const total = HISTORY_SESSIONS.length;
            summaryPill.textContent = `${total} percakapan tersimpan`;

            if (!sessions.length) {
                emptyState.style.display = 'block';
                historyList.style.display = 'none';
                historyCountText.textContent = 'Belum ada percakapan untuk filter ini';
                return;
            }

            emptyState.style.display = 'none';
            historyList.style.display = 'flex';
            historyList.innerHTML = '';
            historyCountText.textContent = `Menampilkan ${sessions.length} percakapan`;

            sessions.forEach(session => {
                const item = document.createElement('article');
                item.className = 'history-item';
                item.dataset.id = session.id;

                const statusClass =
                    session.status === 'ongoing' ? 'status-badge--ongoing' :
                    session.status === 'completed' ? 'status-badge--completed' :
                    'status-badge--draft';

                const statusLabel =
                    session.status === 'ongoing' ? 'Sedang berlangsung' :
                    session.status === 'completed' ? 'Selesai' :
                    'Draft';

                const url = `/chat/${session.id}`;

                item.innerHTML = `
                    <div class="history-main">
                        <div class="history-top-row">
                            <span class="history-course">${session.courseName}</span>
                            <span class="history-clo-pill">${session.cloLabel}</span>
                        </div>
                        <p class="history-snippet">
                            ${session.lastQuestion}
                        </p>
                        <div class="history-meta-row">
                            <span>${session.lastAt}</span>
                            <span class="dot"></span>
                            <span>${session.messagesCount} pesan</span>
                        </div>
                    </div>

                    <div class="history-right">
                        <span class="status-badge ${statusClass}">
                            ${statusLabel}
                        </span>
                        <a href="${url}" class="open-link">
                            Lanjutkan percakapan
                            <span>↗</span>
                        </a>
                    </div>
                `;

                item.addEventListener('click', () => {
                    window.location.href = url;
                });

                historyList.appendChild(item);
            });
        }

        // Event listeners
        filterCourseSelect.addEventListener('change', (e) => {
            selectedCourse = e.target.value;
            applyFilters();
        });

        statusFilters.forEach(btn => {
            btn.addEventListener('click', () => {
                statusFilters.forEach(b => b.classList.remove('pill-filter--active'));
                btn.classList.add('pill-filter--active');
                selectedStatus = btn.dataset.status;
                applyFilters();
            });
        });

        sortSelect.addEventListener('change', (e) => {
            selectedSort = e.target.value;
            applyFilters();
        });

        // Init
        populateCourseFilter();
        applyFilters();
    </script>
</body>
</html>
