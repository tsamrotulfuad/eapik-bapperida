@extends('admin.app')

@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 order-3 order-md-2">
            <div class="row">
                <div class="col-md-12 mb-4">

                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Manajemen Kajian</h4>

                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahBidang">
                                <i class="bx bx-plus"></i> Tambah Kajian
                            </button>
                            <div class="modal fade" id="modalTambahBidang" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <form action="/admin/kajians" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Kajian</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">

                                                <div class="mb-3">
                                                    <label>Judul</label>
                                                    <input type="text" name="judul" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Penulis</label>
                                                    <input type="text" name="penulis" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="bidang" class="form-label">Bidang</label>
                                                    <select class="form-select" id="status" aria-label="Status" name="bidang_id">
                                                        <option selected>Pilih Salah Satu</option>
                                                        {{-- Lakukan looping data model lain --}}
                                                        @foreach ($bidangs as $bidang)
                                                        <option value="{{ $bidang->id }}">{{ $bidang->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Tahun terbit</label>
                                                    <input class="form-control" type="number" name="tahun_terbit" step="1">
                                                </div>

                                                <div class="mb-3">
                                                    <label>Jenis</label>
                                                    <input type="text" name="jenis" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="abstrak" class="form-label">Abstrak</label>
                                                    <textarea class="form-control" name="abstrak" id="abstrak" rows="3"></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Kata Kunci</label>
                                                    <input type="text" name="kata_kunci" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="file_dokumen" class="form-label">File atau Dokumen (Pdf)</label>
                                                    <input class="form-control" name="file_dokumen" type="file" id="file_dokumen" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="cover" class="form-label">File Cover</label>
                                                    <input class="form-control" name="cover" type="file" id="cover" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select class="form-select" id="status" aria-label="status" name="status">
                                                        <option selected>Pilih salah satu</option>
                                                        <option value="draft">Draft</option>
                                                        <option value="internal">Internal</option>
                                                        <option value="publish">Publish</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Batal
                                                </button>

                                                <button class="btn btn-primary">
                                                    Simpan
                                                </button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Bidang</th>
                                        <th>Tahun Terbit</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($kajians as $kajian)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kajian->judul }}</td>
                                        <td>{{ $kajian->penulis }}</td>
                                        <td>{{ $kajian->bidang->nama }}</td>
                                        <td>{{ $kajian->tahun_terbit }}</td>
                                        <td>{{ $kajian->status }}</td>
                                        <td>
                                            <div class="d-flex justify-content-start align-items-center user-name">
                                                <div style="width: 45px; height: 90px;">
                                                    <!-- Kontainer Gambar Sneat -->
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar me-2">
                                                            <!-- Check if image path exists in database -->
                                                            @if($kajian->cover)
                                                            <img src="{{ asset('storage/' . $kajian->cover) }}"
                                                                alt="{{ $kajian->judul }}"
                                                                style="width: 65px; height: 90px; object-fit: cover; border-radius: 4px;">
                                                            @else
                                                            <!-- Optional fallback image -->
                                                            <img src="{{ asset('images/default-thumbnail.png') }}"
                                                                alt="No Image"
                                                                style="width: 65px; height: 90px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <td>
                                            <!-- Show -->
                                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showKajian{{ $kajian->id }}">
                                                <i class="bx bx-show"></i>
                                            </button>

                                            <!-- Edit -->
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editKajian{{ $kajian->id }}">
                                                <i class="bx bx-edit"></i>
                                            </button>

                                            <!-- Delete -->
                                            <button class="btn btn-danger btn-sm btn-delete" data-bs-toggle="modal" data-bs-target="#deleteKajian{{ $kajian->id }}">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    {{-- Show data Kajian --}}
                                    <div class="modal fade" id="showKajian{{ $kajian->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail Kajian</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="row">
                                                        <!-- SISI KIRI: Menampilkan Cover -->
                                                        <div class="col-md-4 text-center mb-3">
                                                            <label class="form-label d-block fw-bold">Cover Kajian</label>
                                                            @if($kajian->cover)
                                                            <img src="{{ asset('storage/' . $kajian->cover) }}"
                                                                alt="Cover Kajian"
                                                                class="img-fluid img-thumbnail rounded shadow-sm"
                                                                style="max-height: auto; object-fit: cover;">
                                                            @else
                                                            <div class="alert alert-secondary py-5 text-muted">
                                                                <i class="bi bi-image" style="font-size: 2rem;"></i>
                                                                <p class="small mb-0 mt-2">Tidak ada cover</p>
                                                            </div>
                                                            @endif
                                                        </div>

                                                        <!-- SISI KANAN: Menampilkan Data Teks & Dokumen -->
                                                        <div class="col-md-8">
                                                            <div class="mb-3">
                                                                <label class="fw-bold text-muted small">Judul</label>
                                                                <input type="text" class="form-control bg-light" value="{{ $kajian->judul }}" readonly>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="fw-bold text-muted">Penulis</label>
                                                                    <input type="text" class="form-control bg-light" value="{{ $kajian->penulis }}" readonly>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="fw-bold text-muted">Bidang</label>
                                                                    <input type="text" class="form-control bg-light" value="{{ $kajian->bidang->nama }}" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4 mb-3">
                                                                    <label class="fw-bold text-muted">Tahun Terbit</label>
                                                                    <input type="text" class="form-control bg-light" value="{{ $kajian->tahun_terbit }}" readonly>
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <label class="fw-bold text-muted">Jenis</label>
                                                                    <input type="text" class="form-control bg-light" value="{{ $kajian->jenis }}" readonly>
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <label class="fw-bold text-muted">Status</label>
                                                                    <div>
                                                                        @php
                                                                            $statusClass = [
                                                                                'publish' => 'bg-success',
                                                                                'internal' => 'bg-info',
                                                                                'draft' => 'bg-secondary',
                                                                            ][$kajian->status] ?? 'bg-secondary';

                                                                            $statusLabel = [
                                                                                'publish' => 'Publish',
                                                                                'internal' => 'Internal',
                                                                                'draft' => 'Draft',
                                                                            ][$kajian->status] ?? ucfirst($kajian->status);
                                                                        @endphp
                                                                        <span class="btn {{ $statusClass }} d-block text-white">
                                                                            {{ $statusLabel }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="fw-bold text-muted small">Abstrak</label>
                                                                <textarea class="form-control bg-light" rows="4" readonly>{{ $kajian->abstrak }}</textarea>
                                                            </div>

                                                            {{-- TOMBOL LIHAT DOKUMEN --}}
                                                            <div class="mb-2">
                                                                <label class="fw-bold text-muted small d-block">File Dokumen</label>
                                                                @if($kajian->file_dokumen)
                                                                <a href="{{ asset('storage/' . $kajian->file_dokumen) }}"
                                                                    target="_blank"
                                                                    class="btn btn-outline-primary btn-md mt-1">
                                                                    <i class="bi bi-file-earmark-pdf-fill"></i> Buka Dokumen Kajian
                                                                </a>
                                                                @else
                                                                <span class="text-danger small italic">File dokumen tidak tersedia</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                                                        Tutup
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    {{-- Edit data Kajian --}}
                                    <div class="modal fade" id="editKajian{{ $kajian->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <form action="/admin/kajians/{{ $kajian->id }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Kegiatan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <div class="modal-body">

                                                        <div class="mb-3">
                                                            <label>Judul</label>
                                                            <input type="text" class="form-control" name="judul" value="{{ $kajian->judul }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Penulis</label>
                                                            <input type="text" class="form-control" name="penulis" value="{{ $kajian->penulis }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Bidang</label>
                                                            <!-- Menggunakan select option agar user bisa memilih bidang yang tersedia -->
                                                            <select class="form-select" name="bidang_id" required>
                                                                @foreach($bidangs as $bidang)
                                                                <option value="{{ $bidang->id }}" {{ $kajian->bidang_id == $bidang->id ? 'selected' : '' }}>
                                                                    {{ $bidang->nama }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Tahun Terbit </label>
                                                            <input type="number" class="form-control" name="tahun_terbit" value="{{ $kajian->tahun_terbit }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Jenis </label>
                                                            <input type="text" class="form-control" name="jenis" value="{{ $kajian->jenis }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Abstrak </label>
                                                            <textarea class="form-control" name="abstrak" id="abstrak" rows="3">{{ $kajian->abstrak }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Kata Kunci</label>
                                                            <input type="text" name="kata_kunci" class="form-control" value="{{ $kajian->kata_kunci }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">File Dokumen (PDF)</label>
                                                            <input type="file" class="form-control" name="file_dokumen">
                                                            @if($kajian->file_dokumen)
                                                            <div class="form-text text-muted mt-1">
                                                                <i class="bi bi-file-earmark-text"></i> File saat ini:
                                                                <a href="{{ asset('storage/' . $kajian->file_dokumen) }}" target="_blank" class="text-decoration-none">
                                                                    Lihat Dokumen
                                                                </a>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">File Cover (Gambar)</label>
                                                            <input type="file" class="form-control" name="cover" accept="image/*">
                                                            @if($kajian->cover)
                                                            <div class="mt-2">
                                                                <p class="form-text text-muted mb-1">Cover saat ini:</p>
                                                                <img src="{{ asset('storage/' . $kajian->cover) }}"
                                                                    alt="Cover Kajian"
                                                                    class="img-thumbnail"
                                                                    style="max-height: 150px; width: auto; display: block;">
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Status</label>
                                                            <!-- Menambahkan atribut name="status" yang sebelumnya hilang -->
                                                            <select class="form-select" name="status" required>
                                                                <option value="draft" {{ $kajian->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                                                <option value="internal" {{ $kajian->status == 'internal' ? 'selected' : '' }}>Internal</option>
                                                                <option value="publish" {{ $kajian->status == 'publish' ? 'selected' : '' }}>Publish</option>
                                                            </select>
                                                        </div>


                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                            Batal
                                                        </button>

                                                        <button class="btn btn-primary">
                                                            Update
                                                        </button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                    {{-- Delete confirmation modal --}}
                                    <div class="modal fade" id="deleteKajian{{ $kajian->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-sm modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="/admin/kajians/{{ $kajian->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <p class="mb-0 text-wrap">
                                                            Apakah Anda yakin ingin menghapus data kajian
                                                            <strong class="text-wrap">{{ $kajian->judul }}</strong>?
                                                        </p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                            Batal
                                                        </button>
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="bx bx-trash"></i> Hapus
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/ Striped Rows -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection