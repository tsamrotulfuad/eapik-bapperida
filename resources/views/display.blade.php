<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-APIK | Bapperida Kota Pasuruan</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col bg-primary">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active data-bs-interval=" 5000">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <h1 class="my-3 px-4">Informasi</h1>
                </div>
                @foreach ($kegiatan as $k)
                <div class="row">
                    <div class="my-3 px-4">
                        <div class="card" style="width: auto;">
                            <div class="card-body">
                                <div class="row">
                                    <h5 class="card-title mb-3">{{ $k->nama_kegiatan }}</h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Tempat: {{ $k->ruangan->nama_ruangan }}</h6>
                                </div>
                                <div class="row my-2">
                                    <div class="col">
                                        <h6 class="card-subtitle text-body-secondary">Bidang: {{ $k->bidang->keterangan }}</h6>
                                    </div>
                                    <div class="col">
                                        <h6 class="card-subtitle text-body-secondary">Waktu: {{ $k->waktu_mulai }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col my-3">
                <h5 class="card-title">Daftar Agenda</h5>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 3%">No</th>
                            <th scope="col" style="width: 25%">Acara</th>
                            <th scope="col" style="width: 12%">Tanggal</th>
                            <th scope="col" style="width: 20%">Tempat</th>
                            <th scope="col" style="width: 8%">Waktu</th>
                            <th scope="col" style="width: 10%">Pengundang</th>
                            <th scope="col" style="width: 10%">Petugas Hadir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                           <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
