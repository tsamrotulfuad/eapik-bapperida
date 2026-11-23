<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Infografis | e-APIK Bapperida Kota Pasuruan</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    @vite(['resources/css/app.scss', 'resources/js/app.js'])

    <style>
        .infografis-card {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            overflow: hidden;
        }

        .infografis-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.45) !important;
        }

        .infografis-thumb-wrapper {
            position: relative;
            aspect-ratio: 3 / 4;
            overflow: hidden;
            background-color: #1a1d20;
        }

        .infografis-thumb-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.35s ease;
        }

        .infografis-card:hover .infografis-thumb-wrapper img {
            transform: scale(1.04);
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

    <!-- Konten Utama Publikasi Infografis -->
    <main class="container px-4 py-5">
        {{-- Header Section & Pencarian --}}
        <div class="row align-items-center mb-5 gy-3 animate__animated animate__fadeIn">
            <div class="col-lg-7">
                {{-- <span class="badge bg-primary-subtle text-primary-emphasis border border-primary-subtle mb-2 px-3 py-2 rounded-pill">
                    Publikasi Visual
                </span> --}}
                <h1 class="fw-bold mb-2">Infografis</h1>
                <p class="text-body-secondary mb-0">
                    Sajian informasi strategis dan capaian pembangunan Kota Pasuruan dalam format visual yang ringkas
                    dan informatif.
                </p>
            </div>
            <div class="col-lg-5">
                <form action="{{ url()->current() }}" method="GET" class="d-flex gap-2">
                    <input type="text" name="q" class="form-control form-control-lg"
                        placeholder="Cari judul atau sumber data..." value="{{ request('q') }}">
                    <button type="submit" class="btn btn-primary px-4">Cari</button>
                    @if (request('q'))
                        <a href="{{ url()->current() }}"
                            class="btn btn-outline-secondary d-flex align-items-center">Reset</a>
                    @endif
                </form>
            </div>
        </div>

        {{-- Grid Infografis --}}
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @forelse ($infografis as $item)
                <div class="col animate__animated animate__fadeInUp">
                    <div class="card h-100 border-secondary-subtle shadow-sm infografis-card">
                        {{-- Thumbnail Gambar Pertama --}}
                        <div class="infografis-thumb-wrapper" role="button" data-bs-toggle="modal"
                            data-bs-target="#modalInfografis{{ $item->id }}">
                            @if (!empty($item->gambar) && is_array($item->gambar))
                                <img src="{{ asset('storage/' . $item->gambar[0]) }}" alt="{{ $item->judul }}"
                                    loading="lazy">

                                {{-- Badge Jumlah Slide jika lebih dari 1 --}}
                                @if (count($item->gambar) > 1)
                                    <span
                                        class="badge bg-dark bg-opacity-75 border border-secondary position-absolute top-0 end-0 m-2 px-2 py-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                            fill="currentColor" class="bi bi-images me-1" viewBox="0 0 16 16">
                                            <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                                            <path
                                                d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1z" />
                                        </svg>
                                        {{ count($item->gambar) }} Slide
                                    </span>
                                @endif
                            @else
                                <div class="d-flex align-items-center justify-content-center h-100 text-body-secondary">
                                    Tidak ada gambar
                                </div>
                            @endif
                        </div>

                        <div class="card-body d-flex flex-column">
                            <div
                                class="d-flex justify-content-between align-items-center text-body-secondary small mb-2">
                                <span>{{ $item->published_at ? $item->published_at->translatedFormat('d M Y') : $item->created_at->translatedFormat('d M Y') }}</span>
                                <span class="d-flex align-items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                        <path
                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                    </svg>
                                    <span
                                        id="view-count-{{ $item->id }}">{{ number_format($item->views ?? 0) }}</span>
                                </span>
                            </div>

                            <h5 class="card-title fs-6 fw-semibold mb-2">
                                <a href="#modalInfografis{{ $item->id }}" data-bs-toggle="modal"
                                    class="text-decoration-none link-body-emphasis stretched-link">
                                    {{ Str::limit($item->judul, 65) }}
                                </a>
                            </h5>

                            @if ($item->sumber_data)
                                <p class="card-text small text-body-secondary mt-auto mb-0">
                                    Sumber: {{ Str::limit($item->sumber_data, 40) }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- MODAL DETAIL & SLIDER CAROUSEL INFOGRAFIS --}}
                <div class="modal fade modal-infografis" id="modalInfografis{{ $item->id }}"
                    data-infografis-id="{{ $item->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content border-secondary-subtle shadow-lg overflow-hidden"
                            style="border-radius: 1rem;">

                            {{-- Modal Header --}}
                            <div class="modal-header border-bottom border-secondary-subtle px-4 py-3 bg-body-tertiary">
                                <div class="d-flex align-items-center gap-2">
                                    <span
                                        class="badge bg-primary-subtle text-primary-emphasis border border-primary-subtle px-2 py-1">
                                        Infografis
                                    </span>
                                    <h5 class="modal-title fw-bold mb-0 text-truncate" style="max-width: 65vw;">
                                        {{ $item->judul }}
                                    </h5>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>

                            {{-- Modal Body --}}
                            <div class="modal-body p-0">
                                <div class="row g-0">

                                    {{-- SISI KIRI: Area Stage & Carousel Gambar --}}
                                    <div class="col-lg-8 d-flex flex-column justify-content-center position-relative"
                                        style="background: radial-gradient(circle at center, #212529 0%, #0f1113 100%); min-height: 450px;">

                                        @if (!empty($item->gambar) && is_array($item->gambar))
                                            <div id="carouselInfografis{{ $item->id }}"
                                                class="carousel slide w-100" data-bs-ride="false">

                                                <div class="carousel-inner">
                                                    @foreach ($item->gambar as $idx => $img)
                                                        <div class="carousel-item {{ $idx === 0 ? 'active' : '' }}">
                                                            <div
                                                                class="d-flex flex-column align-items-center justify-content-center p-3 p-md-4">

                                                                {{-- Frame Gambar --}}
                                                                <div
                                                                    class="position-relative shadow-lg rounded-3 overflow-hidden border border-secondary-subtle bg-dark">
                                                                    <img src="{{ asset('storage/' . $img) }}"
                                                                        class="img-fluid d-block"
                                                                        style="max-height: 68vh; width: auto; object-fit: contain;"
                                                                        alt="{{ $item->judul }} - Slide {{ $idx + 1 }}">
                                                                </div>

                                                                {{-- Toolbar Bawah Gambar: Nomor Slide + Tombol Aksi --}}
                                                                <div
                                                                    class="d-flex flex-wrap align-items-center justify-content-center gap-2 mt-3">
                                                                    @if (count($item->gambar) > 1)
                                                                        <span
                                                                            class="badge rounded-pill bg-dark border border-secondary px-3 py-2 fw-normal">
                                                                            Slide <strong>{{ $idx + 1 }}</strong>
                                                                            dari
                                                                            <strong>{{ count($item->gambar) }}</strong>
                                                                        </span>
                                                                    @endif

                                                                    <a href="{{ asset('storage/' . $img) }}"
                                                                        target="_blank"
                                                                        class="btn btn-sm btn-outline-light rounded-pill px-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="13" height="13"
                                                                            fill="currentColor"
                                                                            class="bi bi-arrows-fullscreen me-1"
                                                                            viewBox="0 0 16 16">
                                                                            <path fill-rule="evenodd"
                                                                                d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707m4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707m0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707m-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707" />
                                                                        </svg>
                                                                        Perbesar
                                                                    </a>

                                                                    <a href="{{ asset('storage/' . $img) }}" download
                                                                        class="btn btn-sm btn-primary rounded-pill px-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="13" height="13"
                                                                            fill="currentColor"
                                                                            class="bi bi-download me-1"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                                                            <path
                                                                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                                                                        </svg>
                                                                        Unduh
                                                                    </a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                {{-- Tombol Navigasi Kiri & Kanan --}}
                                                @if (count($item->gambar) > 1)
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselInfografis{{ $item->id }}"
                                                        data-bs-slide="prev" style="width: 10%;">
                                                        <span
                                                            class="d-flex align-items-center justify-content-center bg-dark bg-opacity-75 border border-secondary rounded-circle shadow"
                                                            style="width: 42px; height: 42px;">
                                                            <span class="carousel-control-prev-icon"
                                                                style="width: 1.2rem; height: 1.2rem;"
                                                                aria-hidden="true"></span>
                                                        </span>
                                                        <span class="visually-hidden">Sebelumnya</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselInfografis{{ $item->id }}"
                                                        data-bs-slide="next" style="width: 10%;">
                                                        <span
                                                            class="d-flex align-items-center justify-content-center bg-dark bg-opacity-75 border border-secondary rounded-circle shadow"
                                                            style="width: 42px; height: 42px;">
                                                            <span class="carousel-control-next-icon"
                                                                style="width: 1.2rem; height: 1.2rem;"
                                                                aria-hidden="true"></span>
                                                        </span>
                                                        <span class="visually-hidden">Selanjutnya</span>
                                                    </button>
                                                @endif
                                            </div>
                                        @endif
                                    </div>

                                    {{-- SISI KANAN: Panel Informasi & Deskripsi --}}
                                    <div
                                        class="col-lg-4 p-4 d-flex flex-column justify-content-between bg-body border-start border-secondary-subtle">
                                        <div>
                                            {{-- Judul Lengkap --}}
                                            <h5 class="fw-bold lh-base mb-3">{{ $item->judul }}</h5>

                                            {{-- Grid Meta Info (Tanggal & Views) --}}
                                            <div class="row g-2 mb-3">
                                                <div class="col-6">
                                                    <div
                                                        class="p-2 rounded-3 bg-body-tertiary border border-secondary-subtle">
                                                        <small class="text-body-secondary d-block"
                                                            style="font-size: 0.72rem;">Dipublikasikan</small>
                                                        <span class="fw-semibold small">
                                                            {{ $item->published_at ? $item->published_at->translatedFormat('d M Y') : '-' }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div
                                                        class="p-2 rounded-3 bg-body-tertiary border border-secondary-subtle">
                                                        <small class="text-body-secondary d-block"
                                                            style="font-size: 0.72rem;">Total Dilihat</small>
                                                        <span class="fw-semibold small">
                                                            <span
                                                                id="modal-view-count-{{ $item->id }}">{{ number_format($item->views ?? 0) }}</span>
                                                            kali
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Sumber Data --}}
                                            @if ($item->sumber_data)
                                                <div
                                                    class="p-2 px-3 rounded-3 bg-body-tertiary border border-secondary-subtle mb-4">
                                                    <small class="text-body-secondary d-block"
                                                        style="font-size: 0.72rem;">Sumber Data</small>
                                                    <span
                                                        class="fw-medium small text-primary-emphasis">{{ $item->sumber_data }}</span>
                                                </div>
                                            @endif

                                            {{-- Deskripsi --}}
                                            <div class="mb-3">
                                                <h6 class="text-uppercase text-body-secondary fw-bold mb-2"
                                                    style="font-size: 0.75rem; letter-spacing: 0.05em;">
                                                    Ringkasan & Keterangan
                                                </h6>
                                                <div class="text-body-secondary small lh-lg"
                                                    style="white-space: pre-line; max-height: 240px; overflow-y: auto;">
                                                    {{ $item->deskripsi ?: 'Tidak ada deskripsi tambahan untuk infografis ini.' }}
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Footer Panel Kanan: Tombol Salin Tautan --}}
                                        <div class="pt-3 border-top border-secondary-subtle mt-3 d-grid">
                                            <button type="button"
                                                class="btn btn-outline-secondary btn-sm rounded-pill py-2 btn-copy-link"
                                                data-url="{{ url('/infografis?q=' . urlencode($item->judul)) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    fill="currentColor" class="bi bi-link-45deg me-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z" />
                                                    <path
                                                        d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z" />
                                                </svg>
                                                <span>Salin Tautan Infografis</span>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-secondary text-center py-5">
                        <h5 class="mb-1">Infografis belum tersedia</h5>
                        <p class="text-body-secondary mb-0">
                            {{ request('q') ? 'Tidak ditemukan infografis yang sesuai dengan kata kunci "' . request('q') . '".' : 'Belum ada infografis yang dipublikasikan saat ini.' }}
                        </p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if ($infografis->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $infografis->withQueryString()->links() }}
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const viewedIds = new Set();

            // 1. Penghitung Views Otomatis saat Modal Dibuka
            document.querySelectorAll('.modal-infografis').forEach(function(modalEl) {
                modalEl.addEventListener('show.bs.modal', function() {
                    const id = this.getAttribute('data-infografis-id');

                    if (!id || viewedIds.has(id)) return;
                    viewedIds.add(id);

                    fetch(`/infografis/${id}/view`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const cardCounter = document.getElementById(`view-count-${id}`);
                                const modalCounter = document.getElementById(
                                    `modal-view-count-${id}`);
                                if (cardCounter) cardCounter.textContent = data.views;
                                if (modalCounter) modalCounter.textContent = data.views;
                            }
                        })
                        .catch(error => console.error('Gagal memperbarui views:', error));
                });
            });

            // 2. Fungsi Tombol Salin Tautan
            document.querySelectorAll('.btn-copy-link').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const url = this.getAttribute('data-url');
                    const label = this.querySelector('span');

                    navigator.clipboard.writeText(url).then(() => {
                        const originalText = label.textContent;
                        label.textContent = 'Tautan Berhasil Disalin!';
                        this.classList.replace('btn-outline-secondary', 'btn-success');

                        setTimeout(() => {
                            label.textContent = originalText;
                            this.classList.replace('btn-success',
                                'btn-outline-secondary');
                        }, 2000);
                    });
                });
            });
        });
    </script>
</body>

</html>
