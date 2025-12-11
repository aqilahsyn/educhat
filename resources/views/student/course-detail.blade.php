<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Mata Kuliah - EduChat</title>
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

        .course-title-row {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .course-title {
            font-size: 20px;
            font-weight: 600;
        }

        .course-chip {
            font-size: 11px;
            padding: 4px 10px;
            border-radius: 999px;
            background-color: var(--primary-soft);
            color: var(--primary);
        }

        .course-meta {
            font-size: 12px;
            color: var(--text-muted);
        }

        .header-actions {
            display: flex;
            flex-direction: column;
            gap: 8px;
            align-items: flex-end;
        }

        .pill {
            font-size: 11px;
            padding: 4px 10px;
            border-radius: 999px;
            background-color: #ECFDF3;
            color: #166534;
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

        /* Main layout */
        .content {
            display: flex;
            gap: 16px;
            min-height: 0;
        }

        .col-left {
            flex: 1.7;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .col-right {
            width: 280px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .card {
            background-color: #FFFFFF;
            border-radius: 24px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
            padding: 18px 20px;
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

        .metrics-row {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        .metric-pill {
            padding: 7px 10px;
            border-radius: 999px;
            background-color: #F9FAFB;
            border: 1px solid #E5E7EB;
            font-size: 11px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .metric-dot {
            width: 7px;
            height: 7px;
            border-radius: 999px;
            background-color: var(--primary);
        }

        .metric-label {
            color: var(--text-muted);
        }

        .metric-value {
            font-weight: 500;
        }

        /* CLO list */
        .clo-list {
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .clo-card {
            border-radius: 18px;
            padding: 10px 12px;
            background-color: #F9FAFB;
            border: 1px solid #E5E7EB;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .clo-header-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }

        .clo-code {
            font-size: 11px;
            font-weight: 600;
            color: var(--primary);
        }

        .clo-tag {
            font-size: 10px;
            padding: 2px 8px;
            border-radius: 999px;
            background-color: #EEF2FF;
            color: #4F46E5;
        }

        .clo-desc {
            font-size: 12px;
            color: var(--text-main);
        }

        .clo-meta-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 11px;
            color: var(--text-muted);
            margin-top: 4px;
        }

        .clo-meta-right {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .clo-link {
            font-size: 11px;
            color: var(--primary-dark);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .clo-link span {
            font-size: 13px;
        }

        /* Right column */
        .info-block-title {
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .info-block-text {
            font-size: 11px;
            color: var(--text-muted);
        }

        .tips-list {
            margin-top: 6px;
            padding-left: 14px;
        }

        .tips-list li {
            font-size: 11px;
            color: var(--text-muted);
            margin-bottom: 4px;
        }

        .label-pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 10px;
            padding: 3px 8px;
            border-radius: 999px;
            background-color: var(--primary-soft);
            color: var(--primary-dark);
            margin-top: 6px;
        }

        .label-pill span {
            font-size: 11px;
        }

        .small-note {
            font-size: 10px;
            color: #9CA3AF;
            margin-top: 6px;
        }

        .cta-btn {
            width: 100%;
            border-radius: 999px;
            border: none;
            padding: 9px 12px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 10px;
        }

        .cta-btn--primary {
            background-color: var(--primary);
            color: #FFFFFF;
        }

        .cta-btn--ghost {
            background-color: #FFFFFF;
            color: var(--primary-dark);
            border: 1px solid #E5E7EB;
        }

        .cta-btn span.icon {
            font-size: 13px;
        }

        @media (max-width: 960px) {
            .content {
                flex-direction: column;
            }

            .col-right {
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
        /* 🔥 UPDATE – Sidebar CLO */
        .sidebar-clo {
            width: 240px;
             background-color: #FFFFFF;
            border-right: 1px solid #E5E7EB;
            border-radius: 0 20px 20px 0;
            padding: 18px 14px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            height: calc(100vh - 64px);
            position: sticky;
            top: 64px;
        }

        .sidebar-title {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .sidebar-item {
            padding: 10px 12px;
        background: #F9FAFB;
            border-radius: 14px;
            border: 1px solid #E5E7EB;
            cursor: pointer;
            font-size: 12px;
        }

        .sidebar-item:hover {
            background: var(--primary-soft);
        }

        .sidebar-item.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

    </style>
</head>
<body>
    @php
        // Id course yang dikirim dari route
        $courseId = (int) ($course ?? 1);
    @endphp

    {{-- Topbar --}}
    <header class="topbar">
        <div class="topbar-icon">
            &lt;/&gt;
        </div>
    </header>

    <main class="page" style="display:flex; gap:20px;">
            <!-- 🔥 UPDATE: Sidebar CLO -->
        <aside class="sidebar-clo">
            <div class="sidebar-title">Capaian Pembelajaran (CLO)</div>

            <div id="sidebarCloItems">
                <!-- akan diisi via JS -->
            </div>
    </aside>
    <div style="flex: 1;">
        {{-- Breadcrumbs --}}
        <nav class="breadcrumbs">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <span>/</span>
            <span>Detail Mata Kuliah</span>
        </nav>

        {{-- Header --}}
        <header class="header-row">
            <div class="header-main" id="headerMain">
                {{-- akan diisi JS --}}
            </div>

            <div class="header-actions">
                <span class="pill" id="headerStatus">Status: Aktif</span>
                <a href="{{ route('dashboard') }}" class="back-link">
                    <span>←</span>
                    Kembali ke Dashboard
                </a>
            </div>
        </header>

        {{-- Main content --}}
        <section class="content">
            {{-- LEFT --}}
            <div class="col-left">
                {{-- Overview card --}}
                <section class="card">
                    <h2 class="section-title">Ringkasan Mata Kuliah</h2>
                    <p class="section-subtitle" id="courseDescription">
                        {{-- diisi JS --}}
                    </p>

                    <div class="metrics-row" id="metricsRow">
                        {{-- diisi JS --}}
                    </div>
                </section>

                {{-- CLO list card --}}
                <section class="card card--soft">
                    <h2 class="section-title">Daftar Capaian Pembelajaran (CLO)</h2>
                    <p class="section-subtitle">
                        Pilih salah satu CLO untuk membuka materi dan mulai bertanya ke EduChat.
                    </p>

                    <div class="clo-list" id="cloList">
                        {{-- diisi JS --}}
                    </div>
                </section>
            </div>

            {{-- RIGHT --}}
            <aside class="col-right">
                <section class="card">
                    <div class="info-block-title">Tentang course ini</div>
                    <p class="info-block-text" id="aboutCourse">
                        {{-- diisi JS --}}
                    </p>

                    <div class="label-pill">
                        <span>🎓</span>
                        <span id="courseLevel">Tingkat: Menengah</span>
                    </div>

                    <p class="small-note">
                        Nanti ketika terhubung ke backend, informasi ini bisa diisi dari data RPS / silabus dosen.
                    </p>
                </section>

                <section class="card">
                    <div class="info-block-title">Tips menggunakan EduChat</div>
                    <ul class="tips-list">
                        <li>Tanyakan satu hal spesifik per pesan supaya jawaban lebih jelas.</li>
                        <li>Jika bingung di satu langkah, kirimkan foto soal atau tuliskan ulang soalnya.</li>
                        <li>Minta dijelaskan pelan-pelan atau dengan analogi kalau masih kurang paham.</li>
                    </ul>

                    <button type="button" class="cta-btn cta-btn--primary" id="firstCloBtn">
                        <span class="icon">➤</span>
                        Mulai dari CLO pertama
                    </button>

                    <button type="button" class="cta-btn cta-btn--ghost">
                        <span class="icon">📚</span>
                        Lihat histori chat (segera)
                    </button>
                </section>
            </aside>
        </section>
        </div> <!-- akhir flex:1 -->
    </main>

    <script>
        // Dummy data course dan CLO (nyambung sama dashboard & chat)
        const COURSE_DATA = [
            {
                id: 1,
                code: 'IF1234',
                name: 'Strategi Algoritma',
                semester: 'Semester 3',
                lecturer: 'Dosen Pengampu: Dr. Contoh Nama',
                status: 'Aktif',
                sessions: '8 pertemuan',
                sks: 3,
                students: 42,
                difficulty: 'Menengah',
                description: 'Mata kuliah ini membahas berbagai strategi penyusunan algoritma, mulai dari brute force, divide and conquer, greedy, hingga dynamic programming pada studi kasus sederhana.',
                about: 'Cocok untuk mahasiswa yang sudah memahami dasar-dasar pemrograman dan struktur data dasar seperti array dan list.',
                clos: [
                    {
                        id: 1,
                        code: 'CLO 1',
                        label: 'Brute Force & Divide and Conquer',
                        desc: 'Mahasiswa mampu menjelaskan dan menerapkan strategi brute force dan divide and conquer untuk menyelesaikan masalah sederhana.',
                        level: 'Pemahaman konsep'
                    },
                    {
                        id: 2,
                        code: 'CLO 2',
                        label: 'Analisis Kompleksitas',
                        desc: 'Mahasiswa mampu menganalisis kompleksitas waktu dari algoritma yang digunakan.',
                        level: 'Analisis'
                    },
                    {
                        id: 3,
                        code: 'CLO 3',
                        label: 'Perbandingan Strategi',
                        desc: 'Mahasiswa mampu membandingkan beberapa strategi algoritma untuk memilih solusi yang lebih efisien.',
                        level: 'Evaluasi'
                    }
                ]
            },
            {
                id: 2,
                code: 'IF2235',
                name: 'Analisis Kompleksitas Algoritma',
                semester: 'Semester 3',
                lecturer: 'Dosen Pengampu: Ir. Contoh Nama',
                status: 'Aktif',
                sessions: '6 pertemuan',
                sks: 2,
                students: 38,
                difficulty: 'Menengah',
                description: 'Fokus mata kuliah ini adalah memahami cara mengukur dan membandingkan performa algoritma menggunakan notasi Big-O, Ω, dan Θ.',
                about: 'Menjadi jembatan sebelum mahasiswa mengambil mata kuliah lanjut yang membutuhkan analisis performa algoritma.',
                clos: [
                    {
                        id: 1,
                        code: 'CLO 1',
                        label: 'Notasi Kompleksitas',
                        desc: 'Mahasiswa memahami notasi kompleksitas waktu dan ruang (Big-O, Ω, Θ).',
                        level: 'Konsep'
                    },
                    {
                        id: 2,
                        code: 'CLO 2',
                        label: 'Analisis Algoritma',
                        desc: 'Mahasiswa mampu menganalisis kompleksitas algoritma iteratif dan rekursif.',
                        level: 'Analisis'
                    }
                ]
            },
            {
                id: 3,
                code: 'IF1101',
                name: 'Algoritma & Pemrograman',
                semester: 'Semester 1',
                lecturer: 'Dosen Pengampu: Contoh Nama, M.Kom.',
                status: 'Selesai',
                sessions: '14 pertemuan',
                sks: 4,
                students: 60,
                difficulty: 'Dasar',
                description: 'Mata kuliah fondasi yang mengenalkan logika pemrograman, tipe data, percabangan, perulangan, dan array.',
                about: 'Biasanya diambil pada semester pertama sebagai pengenalan dunia pemrograman.',
                clos: [
                    {
                        id: 1,
                        code: 'CLO 1',
                        label: 'Struktur Dasar',
                        desc: 'Mahasiswa mengenali struktur dasar pemrograman: sequence, selection, repetition.',
                        level: 'Dasar'
                    },
                    {
                        id: 2,
                        code: 'CLO 2',
                        label: 'Implementasi Algoritma',
                        desc: 'Mahasiswa mampu menyusun algoritma sederhana dan mengimplementasikannya dalam kode.',
                        level: 'Aplikasi'
                    }
                ]
            }
        ];

        const courseId = @json($courseId);
        const course = COURSE_DATA.find(c => c.id === courseId) || COURSE_DATA[0];

        const headerMain = document.getElementById('headerMain');
        const headerStatus = document.getElementById('headerStatus');
        const courseDescription = document.getElementById('courseDescription');
        const metricsRow = document.getElementById('metricsRow');
        const cloList = document.getElementById('cloList');
        const aboutCourse = document.getElementById('aboutCourse');
        const courseLevel = document.getElementById('courseLevel');
        const firstCloBtn = document.getElementById('firstCloBtn');

        function renderHeader() {
            headerMain.innerHTML = `
                <div class="eyebrow">Detail Mata Kuliah</div>
                <div class="course-title-row">
                    <h1 class="course-title">${course.name}</h1>
                    <span class="course-chip">${course.code}</span>
                </div>
                <p class="course-meta">
                    ${course.semester} · ${course.lecturer}
                </p>
            `;
            headerStatus.textContent = `Status: ${course.status}`;
        }

        function renderMetrics() {
            metricsRow.innerHTML = `
                <div class="metric-pill">
                    <span class="metric-dot"></span>
                    <span class="metric-label">SKS</span>
                    <span class="metric-value">${course.sks}</span>
                </div>
                <div class="metric-pill">
                    <span class="metric-dot"></span>
                    <span class="metric-label">Pertemuan</span>
                    <span class="metric-value">${course.sessions}</span>
                </div>
                <div class="metric-pill">
                    <span class="metric-dot"></span>
                    <span class="metric-label">Mahasiswa</span>
                    <span class="metric-value">${course.students} orang</span>
                </div>
                <div class="metric-pill">
                    <span class="metric-dot"></span>
                    <span class="metric-label">Tingkat</span>
                    <span class="metric-value">${course.difficulty}</span>
                </div>
            `;
            courseDescription.textContent = course.description;
            aboutCourse.textContent = course.about;
            courseLevel.textContent = `Tingkat: ${course.difficulty}`;
        }

        function renderClos() {
            cloList.innerHTML = '';

            course.clos.forEach((clo, index) => {
                const cloEl = document.createElement('article');
                cloEl.className = 'clo-card';

                const url = `/course/${course.id}/clo/${clo.id}`;

                cloEl.innerHTML = `
                    <div class="clo-header-row">
                        <div>
                            <div class="clo-code">${clo.code} · ${clo.label}</div>
                        </div>
                        <span class="clo-tag">${clo.level}</span>
                    </div>
                    <p class="clo-desc">${clo.desc}</p>
                    <div class="clo-meta-row">
                        <span>Selaras dengan materi chatbot & contoh soal di EduChat.</span>
                        <div class="clo-meta-right">
                            <a href="${url}" class="clo-link">
                                Lihat & mulai chat
                                <span>↗</span>
                            </a>
                        </div>
                    </div>
                `;

                cloList.appendChild(cloEl);
            });
        }
        // 🔥 UPDATE – Render sidebar CLO
        const sidebarCloItems = document.getElementById('sidebarCloItems');

        function renderSidebarCLO() {
            sidebarCloItems.innerHTML = '';

            course.clos.forEach(clo => {
                const url = `/course/${course.id}/clo/${clo.id}`;
                const item = document.createElement('div');

                item.className = 'sidebar-item';
                item.textContent = `${clo.code} - ${clo.label}`;

                item.addEventListener('click', () => {
                    window.location.href = url;
                });

                sidebarCloItems.appendChild(item);
            });
        }

        renderSidebarCLO();


        function setupFirstCloButton() {
            const firstClo = course.clos[0];
            if (!firstClo) return;

            firstCloBtn.addEventListener('click', () => {
                const url = `/course/${course.id}/clo/${firstClo.id}`;
                window.location.href = url;
            });
        }

        // Init render
        renderHeader();
        renderMetrics();
        renderClos();
        setupFirstCloButton();
    </script>
</body>
</html>