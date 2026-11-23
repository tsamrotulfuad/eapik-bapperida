@extends('admin.app')

@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">

            {{-- Notifikasi Sukses / Error Validasi
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif --}}

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Manajemen Infografis</h4>

                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahInfografis">
                        <i class="bx bx-plus"></i> Tambah Infografis
                    </button>
                </div>

                {{-- MODAL TAMBAH INFOGRAFIS --}}
                <div class="modal fade" id="modalTambahInfografis" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="{{ route('infografis.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Infografis</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Judul <span class="text-danger">*</span></label>
                                        <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Gambar Infografis (Bisa pilih lebih dari 1) <span class="text-danger">*</span></label>
                                        <input type="file" name="gambar[]" class="form-control" multiple accept="image/jpeg,image/png,image/jpg,image/webp" required>
                                        <div class="form-text">Format: JPG, JPEG, PNG, WEBP. Maksimal 2MB per file.</div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Sumber Data</label>
                                        <input type="text" name="sumber_data" class="form-control" placeholder="" value="{{ old('sumber_data') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" rows="3" placeholder="Keterangan singkat infografis...">{{ old('deskripsi') }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Status Publikasi</label>
                                        <select name="is_published" class="form-select">
                                            <option value="1" selected>Publish (Tampilkan)</option>
                                            <option value="0">Draft (Sembunyikan)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- TABEL DATA INFOGRAFIS --}}
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Preview</th>
                                <th>Judul</th>
                                <th>Sumber Data</th>
                                <th>Views</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($infografis as $data)
                            <tr>
                                <td>{{ $infografis->firstItem() + $loop->index }}</td>
                                <td>
                                    @if(!empty($data->gambar) && is_array($data->gambar))
                                        <div class="position-relative d-inline-block">
                                            <img src="{{ asset('storage/' . $data->gambar[0]) }}"
                                                 alt="{{ $data->judul }}"
                                                 style="width: 60px; height: 80px; object-fit: cover; border-radius: 4px;">
                                            @if(count($data->gambar) > 1)
                                                <span class="badge bg-dark position-absolute bottom-0 end-0" style="font-size: 0.65rem;">
                                                    +{{ count($data->gambar) - 1 }}
                                                </span>
                                            @endif
                                        </div>
                                    @else
                                        <span class="badge bg-label-secondary">No Image</span>
                                    @endif
                                </td>
                                <td class="text-wrap" style="max-width: 250px;">
                                    <strong>{{ $data->judul }}</strong>
                                </td>
                                <td>{{ $data->sumber_data ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-label-info">
                                        <i class="bx bx-show"></i> {{ number_format($data->views ?? 0) }}
                                    </span>
                                </td>
                                <td>
                                    @if($data->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Show -->
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showInfografis{{ $data->id }}" title="Detail">
                                        <i class="bx bx-show"></i>
                                    </button>

                                    <!-- Edit -->
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editInfografis{{ $data->id }}" title="Edit">
                                        <i class="bx bx-edit"></i>
                                    </button>

                                    <!-- Delete -->
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteInfografis{{ $data->id }}" title="Hapus">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            {{-- MODAL SHOW DETAIL INFOGRAFIS --}}
                            <div class="modal fade" id="showInfografis{{ $data->id }}" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Infografis</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body text-wrap">
                                            <div class="row">
                                                {{-- Galeri Semua Gambar --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="fw-bold text-muted small d-block mb-2">
                                                        Daftar Gambar ({{ is_array($data->gambar) ? count($data->gambar) : 0 }} Slide)
                                                    </label>
                                                    @if(!empty($data->gambar) && is_array($data->gambar))
                                                        <div class="row g-2">
                                                            @foreach($data->gambar as $index => $img)
                                                                <div class="col-6">
                                                                    <a href="{{ asset('storage/' . $img) }}" target="_blank">
                                                                        <img src="{{ asset('storage/' . $img) }}"
                                                                             alt="Slide {{ $index + 1 }}"
                                                                             class="img-fluid img-thumbnail rounded shadow-sm w-100"
                                                                             style="height: 180px; object-fit: cover;">
                                                                    </a>
                                                                    <small class="text-muted d-block text-center">Slide {{ $index + 1 }}</small>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @else
                                                        <div class="alert alert-secondary text-center">Tidak ada gambar</div>
                                                    @endif
                                                </div>

                                                {{-- Informasi Teks --}}
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="fw-bold text-muted small">Judul</label>
                                                        <input type="text" class="form-control bg-light" value="{{ $data->judul }}" readonly>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="fw-bold text-muted small">Slug</label>
                                                        <input type="text" class="form-control bg-light" value="{{ $data->slug }}" readonly>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="fw-bold text-muted small">Sumber Data</label>
                                                        <input type="text" class="form-control bg-light" value="{{ $data->sumber_data ?? '-' }}" readonly>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-6">
                                                            <label class="fw-bold text-muted small">Status</label>
                                                            <div>
                                                                @if($data->is_published)
                                                                    <span class="badge bg-success">Published</span>
                                                                @else
                                                                    <span class="badge bg-secondary">Draft</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <label class="fw-bold text-muted small">Tanggal Publish</label>
                                                            <p class="mb-0 small">
                                                                {{ $data->published_at ? $data->published_at->format('d M Y, H:i') : '-' }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="fw-bold text-muted small">Deskripsi</label>
                                                        <textarea class="form-control bg-light" rows="4" readonly>{{ $data->deskripsi ?? '-' }}</textarea>
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

                            {{-- MODAL EDIT INFOGRAFIS --}}
                            <div class="modal fade" id="editInfografis{{ $data->id }}" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{ route('infografis.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Infografis</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body text-wrap">
                                                <div class="mb-3">
                                                    <label class="form-label">Judul <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="judul" value="{{ $data->judul }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Ganti Gambar Infografis (Opsional)</label>
                                                    <input type="file" class="form-control" name="gambar[]" multiple accept="image/jpeg,image/png,image/jpg,image/webp">
                                                    <div class="form-text text-warning">
                                                        Kosongkan jika tidak ingin mengganti gambar. Jika mengunggah file baru, seluruh gambar lama akan digantikan.
                                                    </div>

                                                    @if(!empty($data->gambar) && is_array($data->gambar))
                                                        <div class="mt-2">
                                                            <p class="form-text text-muted mb-1">Gambar saat ini:</p>
                                                            <div class="d-flex flex-wrap gap-2">
                                                                @foreach($data->gambar as $img)
                                                                    <img src="{{ asset('storage/' . $img) }}"
                                                                         alt="Preview"
                                                                         class="img-thumbnail"
                                                                         style="height: 90px; width: auto;">
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Sumber Data</label>
                                                    <input type="text" class="form-control" name="sumber_data" value="{{ $data->sumber_data }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Deskripsi</label>
                                                    <textarea class="form-control" name="deskripsi" rows="3">{{ $data->deskripsi }}</textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Status Publikasi</label>
                                                    <select class="form-select" name="is_published">
                                                        <option value="1" {{ $data->is_published ? 'selected' : '' }}>Publish (Tampilkan)</option>
                                                        <option value="0" {{ !$data->is_published ? 'selected' : '' }}>Draft (Sembunyikan)</option>
                                                    </select>
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

                            {{-- MODAL DELETE INFOGRAFIS --}}
                            <div class="modal fade" id="deleteInfografis{{ $data->id }}" tabindex="-1">
                                <div class="modal-dialog modal-sm modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="{{ route('infografis.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body text-wrap">
                                                <p class="mb-0">
                                                    Apakah Anda yakin ingin menghapus infografis
                                                    <strong>{{ $data->judul }}</strong>?
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

                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    Belum ada data infografis.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- PAGINATION --}}
                @if($infografis->hasPages())
                    <div class="card-footer d-flex justify-content-end">
                        {{ $infografis->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection