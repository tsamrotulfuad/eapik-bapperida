<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-APIK | Bapperida Kota Pasuruan</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        /* Agar lebar kolom persis sama antara header & body */
        .fixed-header-table table {
            table-layout: fixed;
            width: 100%;
        }

        /* Set tinggi kontainer agar pas menampilkan 7 baris data */
        .table-body-container {
            height: 336px;
            /* Estimasi 7 baris x ~48px. Sesuaikan jika baris Anda lebih tebal/tipis */
            overflow: hidden;
            position: relative;
        }

        /* Animasi scroll aktif jika data > 7 */
        .credits-scroll {
            position: absolute;
            width: 100%;
            /* Jalankan animasi scroll naik */
            animation: scroll-credits 25s linear infinite;
        }

        /* Jeda animasi saat kursor diarahkan ke tabel */
        .table-body-container:hover .credits-scroll {
            animation-play-state: paused;
        }

        /* Keyframe animasi:
        - 0% - 15%: Tampilkan dulu 7 data pertama (diam sejenak agar sempat dibaca)
        - 100%: Geser data hingga baris paling bawah melewati area pandang
        */
        @keyframes scroll-credits {

            0%,
            15% {
                transform: translateY(0%);
            }

            100% {
                transform: translateY(-100%);
            }
        }
    </style>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body>
    <!-- Memanggil Livewire Single File Component -->
    <livewire:display-informasi />
</body>

</html>