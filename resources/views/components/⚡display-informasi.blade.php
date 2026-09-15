<?php

use App\Models\Agenda;
use App\Models\Kegiatan;
use App\Models\Media;
use Illuminate\Support\Carbon;
use Livewire\Component;

new class extends Component
{
    // Data yang otomatis dikirim ke Blade setiap kali polling/render
    public function with(): array
    {
        return [
            'media' => Media::all(),
            'kegiatanHariIni' => Kegiatan::with(['ruangan', 'bidang'])
                ->whereDate('tanggal_kegiatan', today())
                ->get(),
            'agenda' => Agenda::where('tanggal_agenda', '>=', Carbon::now()->subDays(7))->get(),
        ];
    }
};
?>

<div class="container-fluid" wire:poll.60s>
    <div class="row">
        <!-- Carousel Media (Dilindungi dengan wire:ignore agar tidak ter-reset saat polling) -->
        <div class="col-6">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" wire:ignore>
                <div class="carousel-inner">
                    @forelse ($media as $item)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="5000">
                            <img src="{{ asset('storage/' . $item->image) }}" class="d-block w-100" alt="{{ $item->title ?? 'Media' }}" style="height: auto; object-fit: cover;">
                        </div>
                    @empty
                        <div class="carousel-item active" data-bs-interval="5000">
                            <img src="{{ asset('img/logo/logo.png') }}" class="d-block w-100" alt="No Media" style="height: 100vh; object-fit: cover;">
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Informasi Kegiatan -->
        <div class="col">
            <div class="row">
                <h1 class="my-3 px-4">Informasi</h1>
            </div>
            @forelse ($kegiatanHariIni as $kegiatan)
            <div class="row">
                <div class="my-3 px-4">
                    <div class="card" style="width: auto;">
                        <div class="card-body">
                            <div class="row">
                                <h5 class="card-title mb-3">
                                    {{ $kegiatan->nama_kegiatan }}
                                </h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Tempat: {{ $kegiatan->ruangan->nama_ruangan }}</h6>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <h6 class="card-subtitle text-body-secondary">Bidang: {{ $kegiatan->bidang->keterangan }}</h6>
                                </div>
                                <div class="col">
                                    <h6 class="card-subtitle text-body-secondary">Waktu: {{ $kegiatan->waktu_mulai }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="card border-0 shadow-sm text-center p-4">
                    <div class="card-body">
                        <div class="d-inline-flex align-items-center justify-content-center bg-light text-secondary rounded-circle mb-3" style="width: 50px; height: 50px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h5 class="card-title fw-bold text-white mb-1">Tidak Ada Kegiatan</h5>
                        <p class="card-text text-muted small">Tidak ada jadwal kegiatan yang diagendakan untuk hari ini.</p>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Tabel Agenda -->
    <div class="row">
        <div class="col my-3">
            <h5 class="card-title">Daftar Agenda Kegiatan</h5>
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
                    @forelse ($agenda as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->acara }}</td>
                        <td>{{ Carbon::parse($item->tanggal_agenda)->isoFormat('D MMMM Y') }}</td>
                        <td>{{ $item->tempat }}</td>
                        <td>{{ $item->waktu }}</td>
                        <td>{{ $item->pengundang }}</td>
                        <td>{{ $item->petugas_hadir }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada agenda kegiatan yang tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>