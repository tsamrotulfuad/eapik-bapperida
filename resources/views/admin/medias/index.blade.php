@extends('admin.app')

@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 order-3 order-md-2">
            <div class="row">
                <div class="col-md-12 mb-4">

                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Manajemen Media</h4>

                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahMedia">
                                <i class="bx bx-plus"></i> Tambah Media
                            </button>
                            <div class="modal fade" id="modalTambahMedia" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <form action="/admin/medias" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Media</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">

                                                <div class="mb-3">
                                                    <label>Judul</label>
                                                    <input type="text" name="title" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="image" class="form-label">File Gambar</label>
                                                    <input class="form-control" name="image" type="file" id="image" />
                                                </div>
                                                <div class="mb-3">
                                                    <label>Status</label>
                                                    <select name="status" class="form-select" required>
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
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
                                        <th>Gambar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($medias as $media)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $media->title }}</td>
                                        <td>
                                            <div class="d-flex justify-content-start align-items-center user-name">
                                                <div style="width: 45px; height: 90px;">
                                                    <!-- Kontainer Gambar Sneat -->
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar me-2">
                                                            <!-- Check if image path exists in database -->
                                                            @if($media->image)
                                                            <img src="{{ asset('storage/' . $media->image) }}"
                                                                alt="{{ $media->title }}"
                                                                style="width: 115px; height: 90px; object-fit: cover; border-radius: 4px;">
                                                            @else
                                                            <!-- Optional fallback image -->
                                                            <img src="{{ asset('images/default-thumbnail.png') }}"
                                                                alt="No Image"
                                                                style="width: 115px; height: 90px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $media->status }}</td>
                                        <td>
                                            <!-- Show -->
                                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showMedia{{ $media->id }}">
                                                <i class="bx bx-show"></i>
                                            </button>

                                            <!-- Edit -->
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editMedia{{ $media->id }}">
                                                <i class="bx bx-edit"></i>
                                            </button>

                                             <!-- Delete -->
                                            <button class="btn btn-danger btn-sm btn-delete" data-bs-toggle="modal" data-bs-target="#deleteMedia{{ $media->id }}">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    {{-- Show data Media --}}
                                    <div class="modal fade" id="showMedia{{ $media->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail Media</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="mb-3">
                                                        <label>Judul</label>
                                                        <input type="text" class="form-control" value="{{ $media->title }}" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Gambar</label>
                                                        <input type="text" class="form-control" value="{{ $media->image }}" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Status</label>
                                                        <input type="text" class="form-control" value="{{ $media->status }}" readonly>
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

                                    {{-- Edit data Media --}}
                                    <div class="modal fade" id="editMedia{{ $media->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <form action="/admin/medias/{{ $media->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Media</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <div class="modal-body">



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
                                    <div class="modal fade" id="deleteMedia{{ $media->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-sm modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="/admin/medias/{{ $media->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <p class="mb-0 text-wrap">
                                                            Apakah Anda yakin ingin menghapus data media
                                                            <strong class="text-wrap">{{ $media->title }}</strong>?
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