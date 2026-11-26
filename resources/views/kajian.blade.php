<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kajian & Penelitian | e-APIK Bapperida Kota Pasuruan</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- DearFlip CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@dearhive/dearflip-jquery-flipbook@1.7.3/dflip/css/dflip.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@dearhive/dearflip-jquery-flipbook@1.7.3/dflip/css/themify-icons.min.css">

    @vite(['resources/css/app.scss', 'resources/js/app.js'])

    <style>
        .kajian-card {
            transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
        }

        .kajian-card:hover {
            transform: translateY(-5px);
            border-color: var(--bs-primary) !important;
            box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.45) !important;
        }

        .kajian-cover-wrapper {
            position: relative;
            aspect-ratio: 3 / 4;
            overflow: hidden;
            background: linear-gradient(145deg, #1e2226 0%, #121417 100%);
        }

        .kajian-cover-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.35s ease;
        }

        .kajian-card:hover .kajian-cover-wrapper img {
            transform: scale(1.04);
        }

        .df-lightbox-wrapper {
            z-index: 1080 !important;
        }

        /* Sembunyikan tombol download DearFlip jika masih muncul */
        .df-ui-download,
        .ti-download {
            display: none !important;
        }
    </style>
</head>

<body>
    <header class="py-3 border-bottom border-secondary-subtle">
        <div class="container d-flex flex-wrap justify-content-between align-items-center">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                <img src="{{ asset('img/logo/logo-eapik.png') }}" width="80" alt="Logo e-APIK">
            </a>

            <div class="d-flex align-items-center gap-3">
                <a href="https://instagram.com" target="_blank" rel="noopener noreferrer"
                    class="link-body-emphasis text-decoration-none" aria-label="Instagram Bapperida Kota Pasuruan">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                        class="bi bi-instagram" viewBox="0 0 16 16">
                        <path
                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                    </svg>
                </a>
                <a href="https://youtube.com" target="_blank" rel="noopener noreferrer"
                    class="link-body-emphasis text-decoration-none" aria-label="YouTube Bapperida Kota Pasuruan">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-youtube" viewBox="0 0 16 16">
                        <path
                            d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" />
                    </svg>
                </a>
            </div>
        </div>
    </header>

    <!-- Navbar -->
    @include('navbar')

    <!-- Konten Utama Publikasi Kajian -->
    <main class="container px-4 py-5">

        {{-- Header Section --}}
        <div class="mb-4 animate__animated animate__fadeIn">
            <h1 class="fw-bold mb-2">Dokumen Kajian & Penelitian</h1>
            <p class="text-body-secondary mb-0">
                Kumpulan hasil kajian strategis, riset pembangunan daerah, dan naskah kebijakan Bapperida Kota Pasuruan.
            </p>
        </div>

        {{-- Bar Pencarian & Filter (Bidang & Tahun) --}}
        <div class="card bg-body-tertiary border-secondary-subtle mb-5 shadow-sm animate__animated animate__fadeIn">
            <div class="card-body p-3 p-md-4">
                <form action="{{ url()->current() }}" method="GET" class="row g-3 align-items-end">
                    <div class="col-lg-5">
                        <label class="form-label small text-body-secondary mb-1">Kata Kunci</label>
                        <input type="text" name="q" class="form-control"
                            placeholder="Cari judul, penulis, abstrak, atau kata kunci..." value="{{ request('q') }}">
                    </div>

                    <div class="col-md-5 col-lg-3">
                        <label class="form-label small text-body-secondary mb-1">Bidang</label>
                        <select name="bidang" class="form-select">
                            <option value="">Semua Bidang</option>
                            @foreach ($bidangs as $bidang)
                                <option value="{{ $bidang->id }}"
                                    {{ request('bidang') == $bidang->id ? 'selected' : '' }}>
                                    {{ $bidang->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 col-lg-2">
                        <label class="form-label small text-body-secondary mb-1">Tahun Terbit</label>
                        <select name="tahun" class="form-select">
                            <option value="">Semua Tahun</option>
                            @foreach ($tahuns as $tahun)
                                <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                    {{ $tahun }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 col-lg-2 d-flex gap-2">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                        @if (request()->hasAny(['q', 'bidang', 'tahun']) && (request('q') || request('bidang') || request('tahun')))
                            <a href="{{ url()->current() }}" class="btn btn-outline-secondary"
                                title="Reset Filter">Reset</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        {{-- Grid Daftar Kajian --}}
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($kajians as $kajian)
                <div class="col animate__animated animate__fadeInUp">
                    <div class="card h-100 border-secondary-subtle shadow-sm kajian-card overflow-hidden">
                        <div class="row g-0 h-100">
                            {{-- Cover Kiri --}}
                            <div class="col-4 kajian-cover-wrapper" role="button" data-bs-toggle="modal"
                                data-bs-target="#modalKajian{{ $kajian->id }}">
                                @if ($kajian->cover)
                                    <img src="{{ asset('storage/' . $kajian->cover) }}" alt="{{ $kajian->judul }}"
                                        loading="lazy">
                                @else
                                    <div
                                        class="d-flex flex-column align-items-center justify-content-center h-100 p-2 text-center text-body-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                            fill="currentColor" class="bi bi-journal-text mb-1 opacity-50"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                                            <path
                                                d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                                            <path
                                                d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                                        </svg>
                                        <small style="font-size: 0.7rem;">Dokumen Kajian</small>
                                    </div>
                                @endif
                                <span
                                    class="badge bg-dark bg-opacity-75 border border-secondary position-absolute bottom-0 start-0 m-2">
                                    {{ $kajian->tahun_terbit }}
                                </span>
                            </div>

                            {{-- Informasi Kanan --}}
                            <div class="col-8 d-flex flex-column">
                                <div class="card-body d-flex flex-column p-3">
                                    <div class="mb-2">
                                        <span
                                            class="badge bg-primary-subtle text-primary-emphasis border border-primary-subtle text-wrap text-start"
                                            style="font-size: 0.7rem;">
                                            {{ $kajian->bidang?->nama ?? 'Umum' }}
                                        </span>
                                    </div>

                                    <h5 class="card-title fs-6 fw-bold mb-1 lh-sm">
                                        <a href="#modalKajian{{ $kajian->id }}" data-bs-toggle="modal"
                                            class="text-decoration-none link-body-emphasis stretched-link">
                                            {{ Str::limit($kajian->judul, 75) }}
                                        </a>
                                    </h5>

                                    <p class="small text-body-secondary mb-2">
                                        Oleh: {{ Str::limit($kajian->penulis, 35) }}
                                    </p>

                                    <p class="card-text small text-body-secondary mb-3"
                                        style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ $kajian->abstrak }}
                                    </p>

                                    <div
                                        class="mt-auto pt-2 border-top border-secondary-subtle d-flex justify-content-between align-items-center">
                                        <span class="badge bg-secondary-subtle text-body-secondary fw-normal"
                                            style="font-size: 0.7rem;">
                                            {{ $kajian->jenis }}
                                        </span>
                                        <span class="small text-primary fw-semibold">
                                            Detail &rarr;
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- MODAL DETAIL & PRATINJAU PDF KAJIAN --}}
                <div class="modal fade" id="modalKajian{{ $kajian->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content border-secondary-subtle shadow-lg" style="border-radius: 1rem;">

                            {{-- Modal Header --}}
                            <div class="modal-header border-bottom border-secondary-subtle px-4 py-3 bg-body-tertiary">
                                <div class="d-flex align-items-center gap-2">
                                    <span
                                        class="badge bg-primary-subtle text-primary-emphasis border border-primary-subtle px-2 py-1">
                                        {{ $kajian->jenis }}
                                    </span>
                                    <h5 class="modal-title fw-bold mb-0 text-truncate" style="max-width: 65vw;">
                                        {{ $kajian->judul }}
                                    </h5>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>

                            {{-- Modal Body --}}
                            <div class="modal-body p-4">
                                <div class="row g-4">
                                    {{-- Sisi Kiri: Cover & Tombol Unduh/Buka PDF --}}
                                    <div class="col-lg-4">
                                        <div
                                            class="text-center p-3 rounded-3 bg-body-tertiary border border-secondary-subtle mb-3">
                                            @if ($kajian->cover)
                                                <img src="{{ asset('storage/' . $kajian->cover) }}"
                                                    alt="Cover {{ $kajian->judul }}" class="img-fluid rounded shadow"
                                                    style="max-height: 340px; object-fit: cover;">
                                            @else
                                                <div class="py-5 text-body-secondary">
                                                    <p class="mb-0 small">Cover tidak tersedia</p>
                                                </div>
                                            @endif
                                        </div>

                                        @if ($kajian->file_dokumen)
                                            <div class="d-grid gap-2">
                                                {{-- Tombol DearFlip 3D Flipbook Lightbox --}}
                                                <button type="button"
                                                    class="btn btn-primary rounded-pill py-2 fw-semibold _df_button"
                                                    source="{{ asset('storage/' . $kajian->file_dokumen) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor"
                                                        class="bi bi-book-half me-1" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                                                    </svg>
                                                    Baca (PDF)
                                                </button>

                                                {{-- Tombol Unduh Langsung --}}
                                                {{-- <a href="{{ asset('storage/' . $kajian->file_dokumen) }}" download
                                                    class="btn btn-outline-light rounded-pill py-2">
                                                    Unduh Dokumen
                                                </a> --}}
                                            </div>
                                        @else
                                            <div class="alert alert-warning small text-center mb-0">
                                                Dokumen PDF belum tersedia untuk diunduh.
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Sisi Kanan: Metadata & Abstrak --}}
                                    <div class="col-lg-8">
                                        <h4 class="fw-bold lh-base mb-3">{{ $kajian->judul }}</h4>

                                        {{-- Grid Info Metadata --}}
                                        <div class="row g-2 mb-4">
                                            <div class="col-sm-6">
                                                <div
                                                    class="p-2 px-3 rounded-3 bg-body-tertiary border border-secondary-subtle h-100">
                                                    <small class="text-body-secondary d-block"
                                                        style="font-size: 0.72rem;">Penulis / Penyusun</small>
                                                    <span class="fw-semibold small">{{ $kajian->penulis }}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div
                                                    class="p-2 px-3 rounded-3 bg-body-tertiary border border-secondary-subtle h-100">
                                                    <small class="text-body-secondary d-block"
                                                        style="font-size: 0.72rem;">Bidang Pengampu</small>
                                                    <span
                                                        class="fw-semibold small text-primary-emphasis">{{ $kajian->bidang?->nama ?? '-' }}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div
                                                    class="p-2 px-3 rounded-3 bg-body-tertiary border border-secondary-subtle h-100">
                                                    <small class="text-body-secondary d-block"
                                                        style="font-size: 0.72rem;">Tahun Terbit</small>
                                                    <span class="fw-semibold small">{{ $kajian->tahun_terbit }}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div
                                                    class="p-2 px-3 rounded-3 bg-body-tertiary border border-secondary-subtle h-100">
                                                    <small class="text-body-secondary d-block"
                                                        style="font-size: 0.72rem;">Jenis Dokumen</small>
                                                    <span class="fw-semibold small">{{ $kajian->jenis }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Abstrak --}}
                                        <div class="mb-4">
                                            <h6 class="text-uppercase text-body-secondary fw-bold mb-2"
                                                style="font-size: 0.75rem; letter-spacing: 0.05em;">
                                                Abstrak / Ringkasan Eksekutif
                                            </h6>
                                            <div class="p-3 rounded-3 bg-body-tertiary border border-secondary-subtle text-body small lh-lg"
                                                style="white-space: max-height: 260px; overflow-y: auto;">
                                                {{ $kajian->abstrak }}
                                            </div>
                                        </div>

                                        {{-- Kata Kunci (Tags) --}}
                                        @if ($kajian->kata_kunci)
                                            <div>
                                                <h6 class="text-uppercase text-body-secondary fw-bold mb-2"
                                                    style="font-size: 0.75rem; letter-spacing: 0.05em;">
                                                    Kata Kunci
                                                </h6>
                                                <div class="d-flex flex-wrap gap-1">
                                                    @foreach (explode(',', $kajian->kata_kunci) as $tag)
                                                        <span
                                                            class="badge rounded-pill bg-secondary-subtle text-body-emphasis border border-secondary-subtle fw-normal px-3 py-1">
                                                            #{{ trim($tag) }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer border-top border-secondary-subtle">
                                <button type="button" class="btn btn-secondary rounded-pill px-4"
                                    data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-secondary text-center py-5">
                        <h5 class="mb-1">Dokumen kajian tidak ditemukan</h5>
                        <p class="text-body-secondary mb-0">
                            Silakan ubah kata kunci pencarian atau pilih filter bidang dan tahun yang berbeda.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if ($kajians->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $kajians->withQueryString()->links() }}
            </div>
        @endif
    </main>

    <div class="container">
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
            <div class="col mb-3">
                <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none"
                    aria-label="e-APIK Bapperida">
                    <img src="{{ asset('img/logo/logo-eapik.png') }}" width="115" alt="Logo e-APIK">
                </a>
                <p class="text-body-secondary">&copy; 2026 Bapperida Kota Pasuruan</p>
            </div>
            <div class="col mb-3"></div>
            <div class="col mb-3">
                <h5>Link Terkait</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-body-secondary">Bapperida Kota Pasuruan</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-body-secondary">Pemerintah Kota Pasuruan</a>
                    </li>
                </ul>
            </div>
            <div class="col mb-3">
                <h5>Kontak Kami</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <p class="mb-1 text-body-secondary">Jl. Sultan Agung No. 32 Kota Pasuruan</p>
                    </li>
                    <li class="nav-item">
                        <p class="mb-0 text-body-secondary">Telp/Fax 0343-424064</p>
                    </li>
                </ul>
            </div>
        </footer>
    </div>
    <!-- jQuery & DearFlip JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@dearhive/dearflip-jquery-flipbook@1.7.3/dflip/js/dflip.min.js"></script>

    <style>
        /* Pastikan Lightbox DearFlip muncul di atas Modal Bootstrap (z-index > 1055) */
        .df-lightbox-wrapper {
            z-index: 1080 !important;
        }
    </style>

    <script>
        // Konfigurasi opsi default DearFlip (Opsional - Tema Gelap & Bahasa Indonesia)
        var dFlipLocation = "https://cdn.jsdelivr.net/npm/@dearhive/dearflip-jquery-flipbook@1.7.3/dflip/";
        var option_dflip_global = {
            webgl: true,
            backgroundColor: "#121417",
            autoEnableOutline: false,
            autoEnableThumbnail: false,
            enableDownload: false,
            text: {
                toggleSound: "Suara Halaman",
                toggleThumbnails: "Daftar Halaman",
                toggleOutline: "Daftar Isi",
                previousPage: "Halaman Sebelumnya",
                nextPage: "Halaman Berikutnya",
                toggleFullscreen: "Layar Penuh",
                zoomIn: "Perbesar",
                zoomOut: "Perkecil",
                downloadPDFFile: "Unduh PDF",
                gotoFirstPage: "Halaman Pertama",
                gotoLastPage: "Halaman Terakhir",
                play: "Putar Otomatis",
                pause: "Jeda",
                share: "Bagikan"
            }
        };
    </script>
</body>

</html>
