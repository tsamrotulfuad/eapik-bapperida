@extends('admin.app')

@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">

                {{-- Notifikasi Sukses / Error Validasi
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif --}}

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Manajemen Kajian</h4>

                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahKajian">
                            <i class="bx bx-plus"></i> Tambah Kajian
                        </button>
                    </div>

                    {{-- MODAL TAMBAH KAJIAN --}}
                    <div class="modal fade" id="modalTambahKajian" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="/admin/kajians" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Kajian</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Judul <span class="text-danger">*</span></label>
                                            <input type="text" name="judul" class="form-control"
                                                value="{{ old('judul') }}" required>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Penulis <span class="text-danger">*</span></label>
                                                <input type="text" name="penulis" class="form-control"
                                                    value="{{ old('penulis') }}" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Bidang <span class="text-danger">*</span></label>
                                                <select class="form-select" name="bidang_id" required>
                                                    <option value="" disabled selected>Pilih Salah Satu</option>
                                                    @foreach ($bidangs as $bidang)
                                                        <option value="{{ $bidang->id }}"
                                                            {{ old('bidang_id') == $bidang->id ? 'selected' : '' }}>
                                                            {{ $bidang->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Tahun Terbit <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="number" name="tahun_terbit"
                                                    min="2000" max="2099"
                                                    value="{{ old('tahun_terbit', date('Y')) }}" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Jenis <span class="text-danger">*</span></label>
                                                <input type="text" name="jenis" class="form-control"
                                                    placeholder="Contoh: Kajian Strategis" value="{{ old('jenis') }}"
                                                    required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                                <select class="form-select" name="status" required>
                                                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>
                                                        Draft</option>
                                                    <option value="internal"
                                                        {{ old('status') == 'internal' ? 'selected' : '' }}>Internal
                                                    </option>
                                                    <option value="publish"
                                                        {{ old('status', 'publish') == 'publish' ? 'selected' : '' }}>
                                                        Publish</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Abstrak <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="abstrak" rows="3" required>{{ old('abstrak') }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Kata Kunci <span class="text-danger">*</span></label>
                                            <input type="text" name="kata_kunci" class="form-control"
                                                placeholder="Pisahkan dengan koma" value="{{ old('kata_kunci') }}"
                                                required>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">File Dokumen (PDF) <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" name="file_dokumen" type="file"
                                                    accept="application/pdf" required />
                                                <div class="form-text">Maksimal ukuran file 10MB.</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">File Cover (Gambar) <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" name="cover" type="file"
                                                    accept="image/jpeg,image/png,image/jpg,image/webp" required />
                                                <div class="form-text">Format JPG, PNG, WEBP. Maksimal 2MB.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- TABEL DATA KAJIAN --}}
                    <div class="table-responsive text-nowrap">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Cover</th>
                                    <th>Judul & Penulis</th>
                                    <th>Bidang</th>
                                    <th>Tahun</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($kajians as $kajian)
                                    <tr>
                                        <td>{{ $kajians->firstItem() + $loop->index }}</td>
                                        <td>
                                            @if ($kajian->cover)
                                                <img src="{{ asset('storage/' . $kajian->cover) }}"
                                                    alt="{{ $kajian->judul }}"
                                                    style="width: 55px; height: 75px; object-fit: cover; border-radius: 4px;">
                                            @else
                                                <span class="badge bg-label-secondary">No Cover</span>
                                            @endif
                                        </td>
                                        <td class="text-wrap" style="max-width: 280px;">
                                            <strong class="d-block">{{ $kajian->judul }}</strong>
                                            <small class="text-muted">{{ $kajian->penulis }}</small>
                                        </td>
                                        <td>{{ $kajian->bidang?->nama ?? '-' }}</td>
                                        <td>{{ $kajian->tahun_terbit }}</td>
                                        <td>
                                            @php
                                                $badgeClass =
                                                    [
                                                        'publish' => 'bg-success',
                                                        'internal' => 'bg-info',
                                                        'draft' => 'bg-secondary',
                                                    ][$kajian->status] ?? 'bg-secondary';
                                            @endphp
                                            <span class="badge {{ $badgeClass }}">{{ ucfirst($kajian->status) }}</span>
                                        </td>
                                        <td>
                                            <!-- Show -->
                                            <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#showKajian{{ $kajian->id }}" title="Detail">
                                                <i class="bx bx-show"></i>
                                            </button>

                                            <!-- Edit -->
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editKajian{{ $kajian->id }}" title="Edit">
                                                <i class="bx bx-edit"></i>
                                            </button>

                                            <!-- Delete -->
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteKajian{{ $kajian->id }}" title="Hapus">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-muted">
                                            Belum ada data kajian.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- PAGINATION --}}
                    @if ($kajians->hasPages())
                        <div class="card-footer d-flex justify-content-end">
                            {{ $kajians->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL SHOW, EDIT, DELETE DILETAKKAN DI LUAR TABEL AGAR HTML VALID --}}
    @foreach ($kajians as $kajian)
        {{-- Modal Show Detail Kajian --}}
        <div class="modal fade" id="showKajian{{ $kajian->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Kajian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4 text-center mb-3">
                                <label class="form-label d-block fw-bold">Cover Kajian</label>
                                @if ($kajian->cover)
                                    <img src="{{ asset('storage/' . $kajian->cover) }}" alt="Cover Kajian"
                                        class="img-fluid img-thumbnail rounded shadow-sm"
                                        style="max-height: 280px; object-fit: cover;">
                                @else
                                    <div class="alert alert-secondary py-5 text-muted">
                                        <i class="bx bx-image" style="font-size: 2rem;"></i>
                                        <p class="small mb-0 mt-2">Tidak ada cover</p>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="fw-bold text-muted small">Judul</label>
                                    <input type="text" class="form-control bg-light" value="{{ $kajian->judul }}"
                                        readonly>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold text-muted small">Penulis</label>
                                        <input type="text" class="form-control bg-light"
                                            value="{{ $kajian->penulis }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold text-muted small">Bidang</label>
                                        <input type="text" class="form-control bg-light"
                                            value="{{ $kajian->bidang?->nama ?? '-' }}" readonly>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="fw-bold text-muted small">Tahun Terbit</label>
                                        <input type="text" class="form-control bg-light"
                                            value="{{ $kajian->tahun_terbit }}" readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="fw-bold text-muted small">Jenis</label>
                                        <input type="text" class="form-control bg-light" value="{{ $kajian->jenis }}"
                                            readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="fw-bold text-muted small">Status</label>
                                        <div>
                                            @php
                                                $statusClass =
                                                    [
                                                        'publish' => 'bg-success',
                                                        'internal' => 'bg-info',
                                                        'draft' => 'bg-secondary',
                                                    ][$kajian->status] ?? 'bg-secondary';
                                            @endphp
                                            <span class="badge {{ $statusClass }} fs-6">
                                                {{ ucfirst($kajian->status) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="fw-bold text-muted small">Kata Kunci</label>
                                    <input type="text" class="form-control bg-light"
                                        value="{{ $kajian->kata_kunci }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label class="fw-bold text-muted small">Abstrak</label>
                                    <textarea class="form-control bg-light" rows="4" readonly>{{ $kajian->abstrak }}</textarea>
                                </div>

                                <div class="mb-2">
                                    <label class="fw-bold text-muted small d-block">File Dokumen</label>
                                    @if ($kajian->file_dokumen)
                                        <a href="{{ asset('storage/' . $kajian->file_dokumen) }}" target="_blank"
                                            class="btn btn-outline-primary btn-sm mt-1">
                                            <i class="bx bxs-file-pdf"></i> Buka Dokumen Kajian (PDF)
                                        </a>
                                    @else
                                        <span class="text-danger small fst-italic">File dokumen tidak tersedia</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Edit Kajian --}}
        <div class="modal fade" id="editKajian{{ $kajian->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="/admin/kajians/{{ $kajian->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal-header">
                            <h5 class="modal-title">Edit Kajian</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Judul <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="judul" value="{{ $kajian->judul }}"
                                    required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Penulis <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="penulis"
                                        value="{{ $kajian->penulis }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Bidang <span class="text-danger">*</span></label>
                                    <select class="form-select" name="bidang_id" required>
                                        @foreach ($bidangs as $bidang)
                                            <option value="{{ $bidang->id }}"
                                                {{ $kajian->bidang_id == $bidang->id ? 'selected' : '' }}>
                                                {{ $bidang->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Tahun Terbit <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="tahun_terbit"
                                        value="{{ $kajian->tahun_terbit }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Jenis <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="jenis"
                                        value="{{ $kajian->jenis }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Status <span class="text-danger">*</span></label>
                                    <select class="form-select" name="status" required>
                                        <option value="draft" {{ $kajian->status == 'draft' ? 'selected' : '' }}>Draft
                                        </option>
                                        <option value="internal" {{ $kajian->status == 'internal' ? 'selected' : '' }}>
                                            Internal</option>
                                        <option value="publish" {{ $kajian->status == 'publish' ? 'selected' : '' }}>
                                            Publish</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Abstrak <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="abstrak" rows="3" required>{{ $kajian->abstrak }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kata Kunci <span class="text-danger">*</span></label>
                                <input type="text" name="kata_kunci" class="form-control"
                                    value="{{ $kajian->kata_kunci }}" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Ganti File Dokumen (PDF)</label>
                                    <input type="file" class="form-control" name="file_dokumen"
                                        accept="application/pdf">
                                    @if ($kajian->file_dokumen)
                                        <div class="form-text text-muted mt-1">
                                            File saat ini:
                                            <a href="{{ asset('storage/' . $kajian->file_dokumen) }}" target="_blank"
                                                class="text-decoration-none">
                                                Lihat Dokumen
                                            </a>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Ganti File Cover (Gambar)</label>
                                    <input type="file" class="form-control" name="cover"
                                        accept="image/jpeg,image/png,image/jpg,image/webp">
                                    @if ($kajian->cover)
                                        <div class="mt-2">
                                            <p class="form-text text-muted mb-1">Cover saat ini:</p>
                                            <img src="{{ asset('storage/' . $kajian->cover) }}" alt="Cover Kajian"
                                                class="img-thumbnail" style="max-height: 110px; width: auto;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Modal Konfirmasi Hapus Kajian --}}
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

                        <div class="modal-body text-wrap">
                            <p class="mb-0">
                                Apakah Anda yakin ingin menghapus data kajian
                                <strong>{{ $kajian->judul }}</strong>?
                            </p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">
                                <i class="bx bx-trash"></i> Hapus
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
