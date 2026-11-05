<!DOCTYPE html>
<html lang="id" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('admin/assets/') }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>e-APIK | Display Agenda Pimpinan - Bapperida Kota Pasuruan</title>

    <meta name="description" content="Tampilan Agenda Pimpinan Bapperida Kota Pasuruan" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo/favicon.ico') }}" />

    <!-- Fonts: Public Sans (Sneat Default) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Sneat Icons: Boxicons -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Sneat Core & Theme CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}" />

    <style>
        :root {
            --bs-primary: #696cff;
            --bs-primary-rgb: 105, 108, 255;
        }

        body {
            background-color: #f5f5f9;
            font-family: 'Public Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: #566a7f;
            min-height: 100vh;
        }

        /* Header Navbar */
        .header-display {
            background: #ffffff;
            border-bottom: 1px solid #e7e7e8;
            box-shadow: 0 2px 6px 0 rgba(67, 89, 113, 0.08);
            position: sticky;
            top: 0;
            z-index: 1020;
        }

        .brand-logo-img {
            max-height: 48px;
            width: auto;
            object-fit: contain;
        }

        /* Live Clock Pill */
        .live-clock-pill {
            background: linear-gradient(135deg, #696cff 0%, #3f42c9 100%);
            color: #ffffff;
            border-radius: 50rem;
            padding: 0.5rem 1.25rem;
            font-weight: 600;
            letter-spacing: 0.3px;
            box-shadow: 0 3px 10px rgba(105, 108, 255, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Metric Cards */
        .stat-card {
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 2px 8px 0 rgba(67, 89, 113, 0.08);
            transition: all 0.25s ease;
            position: relative;
            overflow: hidden;
            background: #ffffff;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px 0 rgba(67, 89, 113, 0.14);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 0.6rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
        }

        /* Agenda Card - Modern Sneat Style */
        .agenda-card {
            border: 1px solid #e7e7e8;
            border-radius: 0.75rem;
            background: #ffffff;
            box-shadow: 0 2px 6px 0 rgba(67, 89, 113, 0.08);
            transition: all 0.25s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }

        .agenda-card:hover {
            border-color: #696cff;
            box-shadow: 0 8px 22px 0 rgba(105, 108, 255, 0.16);
            transform: translateY(-2px);
        }

        .agenda-card.today-highlight {
            border-top: 4px solid #ff3e1d;
        }

        .agenda-card.tomorrow-highlight {
            border-top: 4px solid #ffab00;
        }

        .agenda-card.upcoming-highlight {
            border-top: 4px solid #696cff;
        }

        .agenda-card.past-highlight {
            border-top: 4px solid #a1acb8;
            opacity: 0.88;
        }

        .agenda-title {
            color: #384551;
            font-size: 1.05rem;
            line-height: 1.45;
            min-height: 48px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .agenda-details-panel {
            background-color: #f8f9fa;
            border: 1px solid #edf0f2;
            border-radius: 0.65rem;
        }

        .icon-badge-box {
            width: 32px;
            height: 32px;
            min-width: 32px;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pulse-bullet-sm {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background-color: #ffffff;
            display: inline-block;
            animation: pulse-sm 1.4s infinite;
        }

        @keyframes pulse-sm {
            0% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(0.8); }
            100% { opacity: 1; transform: scale(1); }
        }

        .pulse-bullet {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #ff3e1d;
            box-shadow: 0 0 0 rgba(255, 62, 29, 0.5);
            animation: pulse-red 1.6s infinite;
            display: inline-block;
        }

        @keyframes pulse-red {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 62, 29, 0.6);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(255, 62, 29, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(255, 62, 29, 0);
            }
        }

        .auto-refresh-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: #71dd37;
            display: inline-block;
        }

        /* Banner Pimpinan */
        .pimpinan-banner {
            background: linear-gradient(135deg, #1f2747 0%, #2f3349 100%);
            color: #ffffff;
            border-radius: 0.85rem;
            padding: 1.5rem 1.75rem;
            box-shadow: 0 4px 18px 0 rgba(31, 39, 71, 0.25);
            position: relative;
            overflow: hidden;
        }

        .pimpinan-banner::after {
            content: '';
            position: absolute;
            right: -20px;
            bottom: -30px;
            width: 160px;
            height: 160px;
            background: radial-gradient(circle, rgba(105, 108, 255, 0.25) 0%, rgba(105, 108, 255, 0) 70%);
            border-radius: 50%;
        }

        /* Nav Pills Sneat Custom */
        .nav-pills .nav-link {
            border-radius: 0.5rem;
            color: #697a8d;
            font-weight: 500;
            padding: 0.55rem 1rem;
            transition: all 0.2s ease;
        }

        .nav-pills .nav-link:hover {
            color: #696cff;
            background: rgba(105, 108, 255, 0.08);
        }

        .nav-pills .nav-link.active {
            background-color: #696cff;
            color: #ffffff !important;
            box-shadow: 0 3px 8px rgba(105, 108, 255, 0.4);
        }

        /* Table custom styling */
        .table-agenda thead th {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #566a7f;
            background-color: #f5f5f9;
            font-weight: 700;
            border-top: none;
            padding: 0.85rem 1rem;
        }

        .table-agenda tbody td {
            vertical-align: middle;
            padding: 0.95rem 1rem;
            font-size: 0.9rem;
        }

        /* Print Style */
        @media print {
            .no-print,
            .header-display .btn,
            .header-display .live-clock-pill,
            .nav-pills,
            .filter-section,
            .btn-group,
            .modal {
                display: none !important;
            }

            body {
                background: #ffffff !important;
                color: #000000 !important;
            }

            .header-display {
                position: static !important;
                box-shadow: none !important;
                border-bottom: 2px solid #000000 !important;
            }

            .stat-card,
            .agenda-card {
                border: 1px solid #ccc !important;
                box-shadow: none !important;
            }

            #tableViewContainer {
                display: block !important;
            }

            #cardViewContainer {
                display: none !important;
            }

            .print-header {
                display: block !important;
                text-align: center;
                margin-bottom: 1.5rem;
            }
        }

        .print-header {
            display: none;
        }
    </style>
</head>

<body>
    @php
        // Helper formatting tanggal Indonesia aman tanpa dependensi locale OS
        if (!function_exists('formatTanggalIndo')) {
            function formatTanggalIndo($dateStr) {
                if (!$dateStr) return '-';
                try {
                    $c = \Illuminate\Support\Carbon::parse($dateStr);
                    $namaHari = [
                        0 => 'Minggu', 1 => 'Senin', 2 => 'Selasa', 3 => 'Rabu',
                        4 => 'Kamis', 5 => 'Jumat', 6 => 'Sabtu'
                    ];
                    $namaBulan = [
                        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                    ];
                    return $namaHari[$c->dayOfWeek] . ', ' . $c->day . ' ' . $namaBulan[$c->month] . ' ' . $c->year;
                } catch (\Exception $e) {
                    return $dateStr;
                }
            }
        }

        // Fallback variables bila view dipanggil langsung
        $today = \Illuminate\Support\Carbon::today();
        $tomorrow = \Illuminate\Support\Carbon::tomorrow();
        $startOfWeek = \Illuminate\Support\Carbon::now()->startOfWeek();
        $endOfWeek = \Illuminate\Support\Carbon::now()->endOfWeek();
        $startOfMonth = \Illuminate\Support\Carbon::now()->startOfMonth();
        $endOfMonth = \Illuminate\Support\Carbon::now()->endOfMonth();

        $agendas = $agendas ?? collect([]);
        $agendasHariIni = $agendasHariIni ?? collect([]);
        $kegiatanHariIni = $kegiatanHariIni ?? collect([]);

        $countHariIni = $countHariIni ?? (isset($agendasHariIni) ? count($agendasHariIni) : 0);
        $countBesok = $countBesok ?? 0;
        $countMingguIni = $countMingguIni ?? 0;
        $countBulanIni = $countBulanIni ?? 0;
        $countTotal = $countTotal ?? (isset($agendas) ? count($agendas) : 0);

        $filter = $filter ?? request('filter', 'semua');
        $search = $search ?? request('search', '');
        $date = $date ?? request('tanggal', '');
    @endphp

    <!-- HEADER / TOPBAR -->
    <header class="header-display py-2 py-lg-3 px-3 px-md-4">
        <div class="container-fluid d-flex flex-wrap align-items-center justify-content-between gap-3">
            <!-- Brand & Identitas -->
            <div class="d-flex align-items-center gap-3">
                <div>
                    <div class="d-flex align-items-center gap-2">
                        <h4 class="mb-0 fw-bold text-dark d-flex align-items-center gap-2">
                            <span>Agenda Pimpinan</span>
                        </h4>
                    </div>
                    <p class="mb-0 text-muted small fw-medium">
                        BAPPERIDA Kota Pasuruan
                    </p>
                </div>
            </div>

            <!-- Jam Digital Realtime & Aksi Cepat -->
            <div class="d-flex align-items-center flex-wrap gap-2 ms-auto">
                <!-- Live Clock Pill -->
                <div class="live-clock-pill">
                    <i class="bx bx-time-five fs-5"></i>
                    <span id="liveClockDisplay">Memuat Waktu...</span>
                </div>

                <!-- Auto Refresh Indicator -->
                <button type="button" class="btn btn-sm btn-outline-secondary d-none d-md-inline-flex align-items-center gap-2" id="btnToggleAutoRefresh" title="Klik untuk menjeda / mengaktifkan auto-refresh">
                    <span class="auto-refresh-indicator" id="refreshDot"></span>
                    <span id="refreshText">Auto-Refresh (60s)</span>
                </button>

                <!-- Fullscreen Button -->
                <button type="button" class="btn btn-sm btn-icon btn-outline-primary" id="btnFullscreen" title="Layar Penuh (TV Display Mode)">
                    <i class="bx bx-fullscreen fs-5"></i>
                </button>

                <!-- Shortcut Kembali / Ke Admin jika punya akses -->
                <a href="{{ url('/') }}" class="btn btn-sm btn-primary d-inline-flex align-items-center gap-1">
                    <i class="bx bx-home-alt"></i>
                    <span class="d-none d-sm-inline">Beranda</span>
                </a>
            </div>
        </div>
    </header>

    <!-- MAIN CONTAINER -->
    <main class="container-fluid px-3 px-md-4 py-4">

        <!-- BANNER SAMBUTAN PIMPINAN & SUMMARY HARI INI -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="pimpinan-banner">
                    <div class="row align-items-center g-3">
                        <div class="col-lg-8">
                            <h3 class="text-white fw-bold mb-2">
                                Selamat Datang di Display Agenda Pimpinan
                            </h3>
                            <p class="text-white-50 mb-0 pe-lg-5">
                                Pantau seluruh jadwal undangan rapat kedinasan, kegiatan luar daerah, disposisi pimpinan, dan pemanfaatan ruang rapat internal secara terpadu.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- STATISTIC METRIC CARDS (Sneat Style) -->
        <div class="row g-3 mb-4">
            <!-- Hari Ini -->
            <div class="col-6 col-md-3">
                <a href="{{ url()->current() }}?filter=hari-ini" class="text-decoration-none">
                    <div class="card stat-card h-100 {{ $filter === 'hari-ini' ? 'border border-primary' : '' }}">
                        <div class="card-body p-3 p-md-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="badge bg-label-danger rounded-pill">Hari Ini</span>
                                <div class="stat-icon bg-label-danger">
                                    <i class="bx bx-calendar-star"></i>
                                </div>
                            </div>
                            <h3 class="card-title fw-bold text-dark mb-1">{{ $countHariIni }}</h3>
                            <div class="text-muted small fw-medium">Agenda Hari Ini</div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Besok -->
            <div class="col-6 col-md-3">
                <a href="{{ url()->current() }}?filter=besok" class="text-decoration-none">
                    <div class="card stat-card h-100 {{ $filter === 'besok' ? 'border border-primary' : '' }}">
                        <div class="card-body p-3 p-md-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="badge bg-label-warning rounded-pill">Besok</span>
                                <div class="stat-icon bg-label-warning">
                                    <i class="bx bx-calendar-plus"></i>
                                </div>
                            </div>
                            <h3 class="card-title fw-bold text-dark mb-1">{{ $countBesok }}</h3>
                            <div class="text-muted small fw-medium">Agenda Besok</div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Minggu Ini -->
            <div class="col-6 col-md-3">
                <a href="{{ url()->current() }}?filter=minggu-ini" class="text-decoration-none">
                    <div class="card stat-card h-100 {{ $filter === 'minggu-ini' ? 'border border-primary' : '' }}">
                        <div class="card-body p-3 p-md-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="badge bg-label-info rounded-pill">Minggu Ini</span>
                                <div class="stat-icon bg-label-info">
                                    <i class="bx bx-calendar-event"></i>
                                </div>
                            </div>
                            <h3 class="card-title fw-bold text-dark mb-1">{{ $countMingguIni }}</h3>
                            <div class="text-muted small fw-medium">Agenda 7 Hari Ini</div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Bulan Ini / Total -->
            <div class="col-6 col-md-3">
                <a href="{{ url()->current() }}?filter=bulan-ini" class="text-decoration-none">
                    <div class="card stat-card h-100 {{ $filter === 'bulan-ini' ? 'border border-primary' : '' }}">
                        <div class="card-body p-3 p-md-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="badge bg-label-primary rounded-pill">Bulan Ini</span>
                                <div class="stat-icon bg-label-primary">
                                    <i class="bx bx-calendar-alt"></i>
                                </div>
                            </div>
                            <h3 class="card-title fw-bold text-dark mb-1">{{ $countBulanIni }}</h3>
                            <div class="text-muted small fw-medium">Total Bulan Berjalan</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        @if($countHariIni > 0 && ($filter === 'semua' || $filter === 'hari-ini'))
        <!-- HIGHLIGHT: AGENDA HARI INI SECTION -->
        <div class="card border-0 shadow-sm mb-4 bg-white">
            <div class="card-header bg-transparent border-bottom py-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="pulse-bullet"></span>
                    <h5 class="mb-0 fw-bold text-dark">
                        Agenda Khusus Hari Ini &bull; {{ formatTanggalIndo(now()->toDateString()) }}
                    </h5>
                </div>
                <span class="badge bg-danger text-white px-3 py-2 rounded-pill">
                    {{ $countHariIni }} Agenda Aktif
                </span>
            </div>
            <div class="card-body p-3 p-md-4">
                <div class="row g-3">
                    @foreach($agendasHariIni as $todayItem)
                    <div class="col-12 col-lg-6 d-flex align-items-stretch">
                        <div class="agenda-card today-highlight p-3 p-lg-4 w-100 d-flex flex-column">
                            <!-- 1. Header: Waktu & Status -->
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 pb-2 mb-3 border-bottom">
                                <span class="badge bg-label-danger fw-bold d-inline-flex align-items-center gap-1 px-2.5 py-1.5" style="font-size: 0.82rem;">
                                    <i class="bx bx-time-five"></i> {{ \Illuminate\Support\Carbon::parse($todayItem->waktu)->format('H:i') }} WIB
                                </span>
                                <span class="badge bg-danger text-white d-inline-flex align-items-center gap-1">
                                    <span class="pulse-bullet-sm"></span> Hari Ini
                                </span>
                            </div>

                            <!-- 2. Acara -->
                            <h5 class="fw-bold text-dark mb-3 agenda-title" title="{{ $todayItem->nama_agenda }}">
                                {{ $todayItem->nama_agenda }}
                            </h5>

                            <!-- 3. Rincian Terstruktur: Tempat, Pengundang, Petugas -->
                            <div class="agenda-details-panel p-3 mb-3 flex-grow-1 d-flex flex-column justify-content-between">
                                <!-- Tempat -->
                                <div class="d-flex align-items-start gap-2 mb-2 pb-2 border-bottom border-light">
                                    <div class="icon-badge-box bg-label-danger text-danger">
                                        <i class="bx bx-map-pin fs-5"></i>
                                    </div>
                                    <div class="flex-grow-1 min-w-0">
                                        <span class="text-muted text-uppercase fw-semibold d-block" style="font-size: 0.68rem; letter-spacing: 0.5px;">Tempat / Lokasi</span>
                                        <span class="fw-semibold text-dark small text-break">{{ $todayItem->tempat_agenda }}</span>
                                    </div>
                                </div>

                                <!-- Pengundang -->
                                <div class="d-flex align-items-start gap-2 mb-2 pb-2 border-bottom border-light">
                                    <div class="icon-badge-box bg-label-info text-info">
                                        <i class="bx bx-buildings fs-5"></i>
                                    </div>
                                    <div class="flex-grow-1 min-w-0">
                                        <span class="text-muted text-uppercase fw-semibold d-block" style="font-size: 0.68rem; letter-spacing: 0.5px;">Instansi Pengundang</span>
                                        <span class="fw-semibold text-dark small text-break">{{ $todayItem->pengundang }}</span>
                                    </div>
                                </div>

                                <!-- Petugas Hadir -->
                                <div class="d-flex align-items-start gap-2">
                                    <div class="icon-badge-box bg-label-primary text-primary">
                                        <i class="bx bx-user-check fs-5"></i>
                                    </div>
                                    <div class="flex-grow-1 min-w-0">
                                        <span class="text-muted text-uppercase fw-semibold d-block" style="font-size: 0.68rem; letter-spacing: 0.5px;">Petugas Hadir / Disposisi</span>
                                        <span class="badge bg-label-primary text-wrap text-start mt-1 fw-medium py-1 px-2 border-0">
                                            {{ $todayItem->petugas_hadir }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- 4. Tombol Aksi -->
                            <div class="pt-2 border-top d-flex align-items-center justify-content-between mt-auto">
                                <button type="button" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1"
                                        onclick="openDetailModal('{{ addslashes($todayItem->nama_agenda) }}', '{{ formatTanggalIndo($todayItem->tanggal_agenda) }}', '{{ \Illuminate\Support\Carbon::parse($todayItem->waktu)->format('H:i') }} WIB', '{{ addslashes($todayItem->tempat_agenda) }}', '{{ addslashes($todayItem->pengundang) }}', '{{ addslashes($todayItem->petugas_hadir) }}', 'Hari Ini')">
                                    <i class="bx bx-detail"></i> Lihat Rincian
                                </button>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        <!-- FILTER TABS & CONTROL TOOLBAR -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-3">
                <div class="row g-3 align-items-center justify-content-between">
                    <!-- Nav Tabs Filter -->
                    <div class="col-12 col-xl-7">
                        <ul class="nav nav-pills flex-wrap gap-1">
                            <li class="nav-item">
                                <a class="nav-link {{ $filter === 'semua' && !$date ? 'active' : '' }}" href="{{ url()->current() }}?filter=semua">
                                    <i class="bx bx-list-ul me-1"></i> Semua Agenda
                                    <span class="badge bg-white text-primary ms-1 rounded-pill">{{ $countTotal }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $filter === 'hari-ini' ? 'active' : '' }}" href="{{ url()->current() }}?filter=hari-ini">
                                    <i class="bx bx-calendar-star me-1"></i> Hari Ini
                                    <span class="badge bg-white text-danger ms-1 rounded-pill">{{ $countHariIni }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $filter === 'besok' ? 'active' : '' }}" href="{{ url()->current() }}?filter=besok">
                                    <i class="bx bx-calendar-plus me-1"></i> Besok
                                    <span class="badge bg-white text-warning ms-1 rounded-pill">{{ $countBesok }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $filter === 'minggu-ini' ? 'active' : '' }}" href="{{ url()->current() }}?filter=minggu-ini">
                                    <i class="bx bx-calendar-event me-1"></i> 7 Hari Mendatang
                                    <span class="badge bg-white text-info ms-1 rounded-pill">{{ $countMingguIni }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $filter === 'bulan-ini' ? 'active' : '' }}" href="{{ url()->current() }}?filter=bulan-ini">
                                    <i class="bx bx-calendar-alt me-1"></i> Bulan Ini
                                </a>
                            </li>
                            @if(count($kegiatanHariIni) > 0)
                            <li class="nav-item">
                                <a class="nav-link text-success" href="#sectionRapatInternal">
                                    <i class="bx bx-door-open me-1"></i> Rapat Internal
                                    <span class="badge bg-label-success ms-1">{{ count($kegiatanHariIni) }}</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>

                    <!-- Search & View Mode Switcher -->
                    <div class="col-12 col-xl-5">
                        <div class="d-flex align-items-center gap-2 justify-content-xl-end flex-wrap">
                            <!-- Form Filter Tanggal & Search -->
                            <form action="{{ url()->current() }}" method="GET" class="d-flex align-items-center gap-2 flex-grow-1 flex-md-grow-0">
                                @if($filter && $filter !== 'semua')
                                    <input type="hidden" name="filter" value="{{ $filter }}">
                                @endif
                                <div class="input-group input-group-sm" style="max-width: 210px;">
                                    <span class="input-group-text bg-white"><i class="bx bx-calendar"></i></span>
                                    <input type="date" name="tanggal" class="form-control" value="{{ $date }}" title="Filter berdasarkan tanggal tertentu" onchange="this.form.submit()">
                                </div>
                                <div class="input-group input-group-sm" style="max-width: 220px;">
                                    <span class="input-group-text bg-white"><i class="bx bx-search"></i></span>
                                    <input type="text" id="liveSearchInput" name="search" class="form-control" placeholder="Cari acara / tempat..." value="{{ $search }}">
                                </div>
                                @if($date || $search)
                                    <a href="{{ url()->current() }}" class="btn btn-sm btn-icon btn-outline-danger" title="Reset filter">
                                        <i class="bx bx-x"></i>
                                    </a>
                                @endif
                            </form>

                            <!-- View Mode Button Group -->
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-outline-primary active" id="btnViewCard" title="Tampilan Kartu">
                                    <i class="bx bx-grid-alt"></i>
                                </button>
                                <button type="button" class="btn btn-outline-primary" id="btnViewTable" title="Tampilan Tabel">
                                    <i class="bx bx-table"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DAFTAR AGENDA: CARD VIEW CONTAINER -->
        <div id="cardViewContainer">
            @if(count($agendas) > 0)
                <div class="row g-3" id="agendaCardList">
                    @foreach($agendas as $agenda)
                        @php
                            $tglAgenda = \Illuminate\Support\Carbon::parse($agenda->tanggal_agenda);
                            $isToday = $tglAgenda->isToday();
                            $isTomorrow = $tglAgenda->isTomorrow();
                            $isPast = $tglAgenda->isPast() && !$isToday;

                            $highlightClass = $isToday ? 'today-highlight' : ($isTomorrow ? 'tomorrow-highlight' : 'upcoming-highlight');
                            $statusBadge = $isToday
                                ? '<span class="badge bg-danger text-white"><span class="pulse-bullet-sm me-1"></span>Hari Ini</span>'
                                : ($isTomorrow
                                    ? '<span class="badge bg-label-warning fw-semibold"><i class="bx bx-time me-1"></i>Besok</span>'
                                    : ($isPast
                                        ? '<span class="badge bg-label-secondary">Selesai</span>'
                                        : '<span class="badge bg-label-primary fw-semibold"><i class="bx bx-calendar-event me-1"></i>Akan Datang</span>'));
                        @endphp
                        <div class="col-12 col-md-6 col-xl-4 agenda-item-element d-flex align-items-stretch"
                             data-title="{{ strtolower($agenda->nama_agenda) }}"
                             data-tempat="{{ strtolower($agenda->tempat_agenda) }}"
                             data-pengundang="{{ strtolower($agenda->pengundang) }}"
                             data-petugas="{{ strtolower($agenda->petugas_hadir) }}">
                            <div class="agenda-card {{ $highlightClass }} p-3 p-lg-4 w-100 d-flex flex-column">
                                <!-- 1. Header: Tanggal & Waktu & Status -->
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 pb-2 mb-3 border-bottom">
                                    <div class="d-flex align-items-center gap-1 flex-wrap">
                                        <span class="badge bg-label-secondary text-dark fw-semibold d-inline-flex align-items-center gap-1 px-2.5 py-1.5" style="font-size: 0.78rem;">
                                            <i class="bx bx-calendar text-primary fs-6"></i>
                                            <span>{{ formatTanggalIndo($agenda->tanggal_agenda) }}</span>
                                        </span>
                                        <span class="badge bg-label-primary fw-bold d-inline-flex align-items-center gap-1 px-2 py-1.5" style="font-size: 0.78rem;">
                                            <i class="bx bx-time-five"></i>
                                            <span>{{ \Illuminate\Support\Carbon::parse($agenda->waktu)->format('H:i') }} WIB</span>
                                        </span>
                                    </div>
                                    <div>
                                        {!! $statusBadge !!}
                                    </div>
                                </div>

                                <!-- 2. Acara / Nama Agenda -->
                                <h5 class="fw-bold text-dark mb-3 agenda-title" title="{{ $agenda->nama_agenda }}">
                                    {{ $agenda->nama_agenda }}
                                </h5>

                                <!-- 3. Panel Rincian Terstruktur: Tempat, Pengundang, Petugas -->
                                <div class="agenda-details-panel p-3 mb-3 flex-grow-1 d-flex flex-column justify-content-between">
                                    <!-- Tempat / Lokasi -->
                                    <div class="d-flex align-items-start gap-2 mb-2 pb-2 border-bottom border-light">
                                        <div class="icon-badge-box bg-label-danger text-danger">
                                            <i class="bx bx-map-pin fs-5"></i>
                                        </div>
                                        <div class="flex-grow-1 min-w-0">
                                            <span class="text-muted text-uppercase fw-semibold d-block" style="font-size: 0.68rem; letter-spacing: 0.5px;">Tempat / Lokasi</span>
                                            <span class="fw-semibold text-dark small text-break">{{ $agenda->tempat_agenda }}</span>
                                        </div>
                                    </div>

                                    <!-- Pengundang / Instansi -->
                                    <div class="d-flex align-items-start gap-2 mb-2 pb-2 border-bottom border-light">
                                        <div class="icon-badge-box bg-label-info text-info">
                                            <i class="bx bx-buildings fs-5"></i>
                                        </div>
                                        <div class="flex-grow-1 min-w-0">
                                            <span class="text-muted text-uppercase fw-semibold d-block" style="font-size: 0.68rem; letter-spacing: 0.5px;">Instansi Pengundang</span>
                                            <span class="fw-semibold text-dark small text-break">{{ $agenda->pengundang }}</span>
                                        </div>
                                    </div>

                                    <!-- Petugas Hadir / Disposisi -->
                                    <div class="d-flex align-items-start gap-2">
                                        <div class="icon-badge-box bg-label-primary text-primary">
                                            <i class="bx bx-user-check fs-5"></i>
                                        </div>
                                        <div class="flex-grow-1 min-w-0">
                                            <span class="text-muted text-uppercase fw-semibold d-block" style="font-size: 0.68rem; letter-spacing: 0.5px;">Petugas Hadir / Disposisi</span>
                                            <span class="badge bg-label-primary text-wrap text-start mt-1 fw-medium py-1 px-2 border-0">
                                                {{ $agenda->petugas_hadir }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- 4. Footer Aksi -->
                                <div class="pt-2 border-top d-flex align-items-center justify-content-between mt-auto">
                                    <button type="button" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1"
                                            onclick="openDetailModal('{{ addslashes($agenda->nama_agenda) }}', '{{ formatTanggalIndo($agenda->tanggal_agenda) }}', '{{ \Illuminate\Support\Carbon::parse($agenda->waktu)->format('H:i') }} WIB', '{{ addslashes($agenda->tempat_agenda) }}', '{{ addslashes($agenda->pengundang) }}', '{{ addslashes($agenda->petugas_hadir) }}', '{{ $isToday ? 'Hari Ini' : ($isTomorrow ? 'Besok' : 'Akan Datang') }}')">
                                        <i class="bx bx-detail"></i> Lihat Rincian
                                    </button>
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="card border-0 shadow-sm text-center py-5">
                    <div class="card-body">
                        <div class="d-inline-flex align-items-center justify-content-center bg-label-primary rounded-circle mb-3" style="width: 70px; height: 70px;">
                            <i class="bx bx-calendar-x fs-1"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-2">Tidak Ada Agenda Ditemukan</h4>
                        <p class="text-muted mb-4 max-w-500 mx-auto">
                            Tidak ada jadwal kegiatan atau agenda pimpinan untuk kriteria filter yang dipilih. Silakan periksa kembali atau pilih filter tanggal lain.
                        </p>
                        <a href="{{ url()->current() }}" class="btn btn-primary">
                            <i class="bx bx-reset me-1"></i> Tampilkan Semua Agenda
                        </a>
                    </div>
                </div>
            @endif
        </div>

        <!-- DAFTAR AGENDA: TABLE VIEW CONTAINER (Default Hidden di Web, Aktif saat Print atau Toggle) -->
        <div id="tableViewContainer" style="display: none;">
            <div class="card border-0 shadow-sm">
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped table-hover table-agenda mb-0">
                        <thead>
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th style="width: 140px;">Hari / Tanggal</th>
                                <th style="width: 90px;">Waktu</th>
                                <th>Nama Acara / Agenda</th>
                                <th>Tempat / Lokasi</th>
                                <th>Pengundang</th>
                                <th>Petugas Hadir / Disposisi</th>
                                <th class="no-print" style="width: 80px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="agendaTableBody">
                            @forelse($agendas as $idx => $item)
                                @php
                                    $tgl = \Illuminate\Support\Carbon::parse($item->tanggal_agenda);
                                    $isToday = $tgl->isToday();
                                @endphp
                                <tr class="{{ $isToday ? 'table-warning' : '' }} agenda-item-element"
                                    data-title="{{ strtolower($item->nama_agenda) }}"
                                    data-tempat="{{ strtolower($item->tempat_agenda) }}"
                                    data-pengundang="{{ strtolower($item->pengundang) }}"
                                    data-petugas="{{ strtolower($item->petugas_hadir) }}">
                                    <td class="text-center fw-bold">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="fw-bold text-dark">{{ formatTanggalIndo($item->tanggal_agenda) }}</div>
                                        @if($isToday)
                                            <span class="badge bg-danger fs-tiny">Hari Ini</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-label-primary fw-semibold">
                                            {{ \Illuminate\Support\Carbon::parse($item->waktu)->format('H:i') }} WIB
                                        </span>
                                    </td>
                                    <td class="text-wrap fw-semibold text-dark" style="min-width: 240px;">
                                        {{ $item->nama_agenda }}
                                    </td>
                                    <td class="text-wrap" style="min-width: 160px;">
                                        <i class="bx bx-map-pin text-danger me-1"></i>{{ $item->tempat_agenda }}
                                    </td>
                                    <td class="text-wrap" style="min-width: 160px;">
                                        <i class="bx bx-building text-info me-1"></i>{{ $item->pengundang }}
                                    </td>
                                    <td class="text-wrap" style="min-width: 180px;">
                                        <span class="badge bg-label-info text-wrap text-start">
                                            <i class="bx bx-user-check me-1"></i>{{ $item->petugas_hadir }}
                                        </span>
                                    </td>
                                    <td class="no-print">
                                        <button type="button" class="btn btn-sm btn-icon btn-outline-primary"
                                                title="Lihat Detail"
                                                onclick="openDetailModal('{{ addslashes($item->nama_agenda) }}', '{{ formatTanggalIndo($item->tanggal_agenda) }}', '{{ \Illuminate\Support\Carbon::parse($item->waktu)->format('H:i') }} WIB', '{{ addslashes($item->tempat_agenda) }}', '{{ addslashes($item->pengundang) }}', '{{ addslashes($item->petugas_hadir) }}', '{{ $isToday ? 'Hari Ini' : 'Terjadwal' }}')">
                                            <i class="bx bx-detail"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4 text-muted">
                                        Tidak ada agenda kegiatan yang tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @if(count($kegiatanHariIni) > 0)
        <!-- SECTION RAPAT INTERNAL BAPPERIDA HARI INI -->
        <div class="mt-5" id="sectionRapatInternal">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-transparent border-bottom py-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <div class="stat-icon bg-label-success" style="width: 36px; height: 36px; font-size: 1.2rem;">
                            <i class="bx bx-door-open"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-bold text-dark">Pemanfaatan Ruang Rapat Internal Bapperida Hari Ini</h5>
                            <small class="text-muted">Agenda rapat internal kantor Bapperida Kota Pasuruan</small>
                        </div>
                    </div>
                    <span class="badge bg-label-success px-3 py-2 rounded-pill">
                        {{ count($kegiatanHariIni) }} Ruangan Digunakan
                    </span>
                </div>
                <div class="card-body p-3 p-md-4">
                    <div class="row g-3">
                        @foreach($kegiatanHariIni as $rapat)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="p-3 rounded-3 border bg-light h-100">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="badge bg-label-success fw-semibold">
                                        <i class="bx bx-building-house me-1"></i>{{ $rapat->ruangan->nama_ruangan ?? 'Ruang Rapat' }}
                                    </span>
                                    <span class="badge bg-label-primary">
                                        {{ \Illuminate\Support\Carbon::parse($rapat->waktu_mulai)->format('H:i') }} - {{ \Illuminate\Support\Carbon::parse($rapat->waktu_selesai)->format('H:i') }} WIB
                                    </span>
                                </div>
                                <h6 class="fw-bold text-dark mb-2">
                                    {{ $rapat->nama_kegiatan }}
                                </h6>
                                <p class="text-muted small mb-2 text-truncate-2">
                                    {{ $rapat->deskripsi ?? 'Tidak ada keterangan tambahan.' }}
                                </p>
                                <div class="pt-2 border-top d-flex align-items-center justify-content-between fs-tiny text-muted">
                                    <span><i class="bx bx-group me-1"></i>Bidang: <strong>{{ $rapat->bidang->keterangan ?? ($rapat->bidang->nama_bidang ?? '-') }}</strong></span>
                                    <span class="text-uppercase fw-semibold text-success">{{ $rapat->status ?? 'Terjadwal' }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif

    </main>

    <!-- FOOTER -->
    <footer class="footer bg-white border-top py-3 mt-5 no-print">
        <div class="container-fluid px-4 d-flex flex-wrap justify-content-between align-items-center gap-2 small text-muted">
            <div>
                &copy; {{ date('Y') }} <strong>BAPPERIDA Kota Pasuruan</strong>
            </div>
        </div>
    </footer>

    <!-- MODAL DETAIL AGENDA (Sneat Style) -->
    <div class="modal fade" id="modalDetailAgenda" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-bottom pb-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="stat-icon bg-label-primary" style="width: 40px; height: 40px; font-size: 1.3rem;">
                            <i class="bx bx-calendar-event"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold text-dark mb-0">Rincian Agenda Pimpinan</h5>
                            <small class="text-muted" id="modalStatusBadge">Informasi Lengkap</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-4">
                    <h5 class="fw-bold text-primary mb-3" id="modalNamaAgenda">-</h5>

                    <div class="list-group list-group-flush rounded-3 border">
                        <div class="list-group-item d-flex align-items-start gap-3 py-3">
                            <i class="bx bx-calendar fs-4 text-primary mt-1"></i>
                            <div>
                                <div class="text-muted fs-tiny text-uppercase fw-semibold">Hari / Tanggal</div>
                                <div class="fw-bold text-dark" id="modalTanggalAgenda">-</div>
                            </div>
                        </div>

                        <div class="list-group-item d-flex align-items-start gap-3 py-3">
                            <i class="bx bx-time fs-4 text-warning mt-1"></i>
                            <div>
                                <div class="text-muted fs-tiny text-uppercase fw-semibold">Waktu Pelaksanaan</div>
                                <div class="fw-bold text-dark" id="modalWaktuAgenda">-</div>
                            </div>
                        </div>

                        <div class="list-group-item d-flex align-items-start gap-3 py-3">
                            <i class="bx bx-map-pin fs-4 text-danger mt-1"></i>
                            <div>
                                <div class="text-muted fs-tiny text-uppercase fw-semibold">Tempat / Lokasi</div>
                                <div class="fw-bold text-dark" id="modalTempatAgenda">-</div>
                            </div>
                        </div>

                        <div class="list-group-item d-flex align-items-start gap-3 py-3">
                            <i class="bx bx-buildings fs-4 text-info mt-1"></i>
                            <div>
                                <div class="text-muted fs-tiny text-uppercase fw-semibold">Instansi / Pengundang</div>
                                <div class="fw-bold text-dark" id="modalPengundangAgenda">-</div>
                            </div>
                        </div>

                        <div class="list-group-item d-flex align-items-start gap-3 py-3 bg-light">
                            <i class="bx bx-user-check fs-4 text-success mt-1"></i>
                            <div>
                                <div class="text-muted fs-tiny text-uppercase fw-semibold">Petugas Hadir / Pejabat Disposisi</div>
                                <div class="fw-bold text-success" id="modalPetugasAgenda">-</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top pt-3 d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-success d-inline-flex align-items-center gap-1" id="btnSalinModalWA">
                        <i class="bx bxl-whatsapp fs-5"></i> Salin ke WhatsApp
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- TOAST NOTIFIKASI -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1090">
        <div id="copyToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body d-flex align-items-center gap-2">
                    <i class="bx bx-check-circle fs-5"></i>
                    <span>Teks rangkuman agenda berhasil disalin ke clipboard!</span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>

    <!-- Sneat Core JS & Vendors -->
    <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>

    <script>
        // 1. JAM DIGITAL REALTIME INDONESIA
        function updateLiveClock() {
            const now = new Date();
            const hariNames = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const bulanNames = [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ];

            const hari = hariNames[now.getDay()];
            const tgl = String(now.getDate()).padStart(2, '0');
            const bln = bulanNames[now.getMonth()];
            const thn = now.getFullYear();

            const jam = String(now.getHours()).padStart(2, '0');
            const mnt = String(now.getMinutes()).padStart(2, '0');
            const dtk = String(now.getSeconds()).padStart(2, '0');

            const textClock = `${hari}, ${tgl} ${bln} ${thn} • ${jam}:${mnt}:${dtk} WIB`;
            const clockEl = document.getElementById('liveClockDisplay');
            if (clockEl) {
                clockEl.textContent = textClock;
            }
        }
        setInterval(updateLiveClock, 1000);
        updateLiveClock();

        // 2. TOGGLE CARD VIEW VS TABLE VIEW
        const btnViewCard = document.getElementById('btnViewCard');
        const btnViewTable = document.getElementById('btnViewTable');
        const cardViewContainer = document.getElementById('cardViewContainer');
        const tableViewContainer = document.getElementById('tableViewContainer');

        if (btnViewCard && btnViewTable) {
            btnViewCard.addEventListener('click', function () {
                btnViewCard.classList.add('active');
                btnViewTable.classList.remove('active');
                cardViewContainer.style.display = 'block';
                tableViewContainer.style.display = 'none';
            });

            btnViewTable.addEventListener('click', function () {
                btnViewTable.classList.add('active');
                btnViewCard.classList.remove('active');
                cardViewContainer.style.display = 'none';
                tableViewContainer.style.display = 'block';
            });
        }

        // 3. FULLSCREEN MODE TOGGLE
        const btnFullscreen = document.getElementById('btnFullscreen');
        if (btnFullscreen) {
            btnFullscreen.addEventListener('click', function () {
                if (!document.fullscreenElement) {
                    document.documentElement.requestFullscreen().catch(err => {
                        console.warn(`Error attempting to enable fullscreen: ${err.message}`);
                    });
                    btnFullscreen.innerHTML = '<i class="bx bx-exit-fullscreen fs-5"></i>';
                } else {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                        btnFullscreen.innerHTML = '<i class="bx bx-fullscreen fs-5"></i>';
                    }
                }
            });
        }

        // 4. AUTO-REFRESH SETIAP 60 DETIK (Dapat Dijeda)
        let refreshSeconds = 60;
        let isAutoRefreshActive = true;
        const refreshText = document.getElementById('refreshText');
        const refreshDot = document.getElementById('refreshDot');
        const btnToggleAutoRefresh = document.getElementById('btnToggleAutoRefresh');

        const refreshInterval = setInterval(function () {
            if (!isAutoRefreshActive) return;

            refreshSeconds--;
            if (refreshText) {
                refreshText.textContent = `Auto-Refresh (${refreshSeconds}s)`;
            }

            if (refreshSeconds <= 0) {
                window.location.reload();
            }
        }, 1000);

        if (btnToggleAutoRefresh) {
            btnToggleAutoRefresh.addEventListener('click', function () {
                isAutoRefreshActive = !isAutoRefreshActive;
                if (isAutoRefreshActive) {
                    refreshDot.style.backgroundColor = '#71dd37';
                    refreshText.textContent = `Auto-Refresh (${refreshSeconds}s)`;
                    btnToggleAutoRefresh.classList.remove('btn-outline-danger');
                    btnToggleAutoRefresh.classList.add('btn-outline-secondary');
                } else {
                    refreshDot.style.backgroundColor = '#ff3e1d';
                    refreshText.textContent = 'Auto-Refresh (Dijeda)';
                    btnToggleAutoRefresh.classList.remove('btn-outline-secondary');
                    btnToggleAutoRefresh.classList.add('btn-outline-danger');
                }
            });
        }

        // 5. LIVE SEARCH INSTAN DI SISI CLIENT
        const liveSearchInput = document.getElementById('liveSearchInput');
        if (liveSearchInput) {
            liveSearchInput.addEventListener('input', function (e) {
                const keyword = e.target.value.toLowerCase().trim();
                const items = document.querySelectorAll('.agenda-item-element');

                items.forEach(item => {
                    const title = item.getAttribute('data-title') || '';
                    const tempat = item.getAttribute('data-tempat') || '';
                    const pengundang = item.getAttribute('data-pengundang') || '';
                    const petugas = item.getAttribute('data-petugas') || '';

                    if (title.includes(keyword) || tempat.includes(keyword) || pengundang.includes(keyword) || petugas.includes(keyword)) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        }

        // 6. MODAL DETAIL AGENDA
        let currentModalAgendaData = null;
        function openDetailModal(nama, tanggal, waktu, tempat, pengundang, petugas, status) {
            currentModalAgendaData = { nama, tanggal, waktu, tempat, pengundang, petugas };

            document.getElementById('modalNamaAgenda').textContent = nama;
            document.getElementById('modalTanggalAgenda').textContent = tanggal;
            document.getElementById('modalWaktuAgenda').textContent = waktu;
            document.getElementById('modalTempatAgenda').textContent = tempat;
            document.getElementById('modalPengundangAgenda').textContent = pengundang;
            document.getElementById('modalPetugasAgenda').textContent = petugas;
            document.getElementById('modalStatusBadge').textContent = `Status: ${status}`;

            const modalElement = document.getElementById('modalDetailAgenda');
            const bsModal = new bootstrap.Modal(modalElement);
            bsModal.show();
        }

        // 7. SALIN TEKS FORMAT WHATSAPP (Untuk Disposisi / Notifikasi)
        function copyAgendaWA(nama, tanggal, waktu, tempat, pengundang, petugas) {
            const textToCopy = `*JADWAL AGENDA PIMPINAN BAPPERIDA*\n` +
                `━━━━━━━━━━━━━━━━━━━━\n` +
                `📌 *Acara:* ${nama}\n` +
                `📅 *Hari/Tgl:* ${tanggal}\n` +
                `⏰ *Waktu:* ${waktu}\n` +
                `📍 *Tempat:* ${tempat}\n` +
                `🏢 *Pengundang:* ${pengundang}\n` +
                `👤 *Petugas Hadir:* ${petugas}\n` +
                `━━━━━━━━━━━━━━━━━━━━\n` +
                `_Sumber: e-APIK Bapperida Kota Pasuruan_`;

            navigator.clipboard.writeText(textToCopy).then(() => {
                const toastEl = document.getElementById('copyToast');
                if (toastEl) {
                    const toast = new bootstrap.Toast(toastEl);
                    toast.show();
                }
            }).catch(err => {
                alert('Teks agenda: \n\n' + textToCopy);
            });
        }

        // Tombol salin dari dalam modal
        const btnSalinModalWA = document.getElementById('btnSalinModalWA');
        if (btnSalinModalWA) {
            btnSalinModalWA.addEventListener('click', function () {
                if (currentModalAgendaData) {
                    copyAgendaWA(
                        currentModalAgendaData.nama,
                        currentModalAgendaData.tanggal,
                        currentModalAgendaData.waktu,
                        currentModalAgendaData.tempat,
                        currentModalAgendaData.pengundang,
                        currentModalAgendaData.petugas
                    );
                }
            });
        }
    </script>
</body>

</html>
