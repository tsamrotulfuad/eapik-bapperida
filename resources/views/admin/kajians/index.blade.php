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

                                        <form action="/admin/kegiatans" method="POST">
                                            @csrf

                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Kajian</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">

                                                <div class="mb-3">
                                                    <label>Nama</label>
                                                    <input type="text" name="nama_kegiatan" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Deskripsi</label>
                                                    <input type="text" name="deskripsi" class="form-control" required>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Tanggal</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" name="tanggal_kegiatan" type="date" id="html5-date-input" />

                                                    </div>
                                                </div>

                                                    <div class="mb-3 row">
                                                        <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Waktu Mulai</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" name="waktu_mulai" type="time" id="html5-time-input" />
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Waktu Selesai</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" name="waktu_selesai" type="time" id="html5-time-input" />
                                                        </div>
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
                                                        <label for="ruangan" class="form-label">Ruangan</label>
                                                        <select class="form-select" id="status" aria-label="Status" name="ruangan_id">
                                                            <option selected>Pilih Salah Satu</option>
                                                            {{-- Lakukan looping data model lain --}}
                                                            @foreach ($ruangans as $ruangan)
                                                            <option value="{{ $ruangan->id }}">{{ $ruangan->nama_ruangan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="status" class="form-label">Status</label>
                                                        <select class="form-select" id="status" aria-label="Status" name="status">
                                                            <option selected>Pilih Salah Satu</option>
                                                            <option value="terjadwal">Terjadwal</option>
                                                            <option value="berlangsung">Berlangsung</option>
                                                            <option value="selesai">Selesai</option>
                                                            <option value="batal">Batal</option>
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
                                        <th>Nama</th>
                                        <th>Tanggal Kegiatan</th>
                                        <th>Waktu Mulai</th>
                                        <th>Waktu Selesai</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($kajians as $kajian)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kajian->nama_kegiatan }}</td>
                                        <td>{{ $kajian->tanggal_kegiatan }}</td>
                                        <td>{{ $kajian->waktu_mulai }}</td>
                                        <td>{{ $kajian->waktu_selesai }}</td>
                                        <td>{{ $kajian->status }}</td>
                                        <td>
                                            <!-- Show -->
                                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showKegiatan{{ $kajian->id }}">
                                                <i class="bx bx-show"></i>
                                            </button>

                                            <!-- Edit -->
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editKegiatan{{ $kajian->id }}">
                                                <i class="bx bx-edit"></i>
                                            </button>

                                            <!-- Delete -->
                                            <form action="/admin/kajians/{{ $kajian->id }}" method="POST" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm btn-delete">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    {{-- Show data Kegiatan --}}
                                    <div class="modal fade" id="showKegiatan{{ $kegiatan->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail Kegiatan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="mb-3">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" value="{{ $kegiatan->nama_kegiatan }}" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Deskripsi</label>
                                                        <input type="text" class="form-control" value="{{ $kegiatan->deskripsi }}" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Mulai</label>
                                                        <input type="text" class="form-control" value="{{ $kegiatan->waktu_mulai }}" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Selesai </label>
                                                        <input type="text" class="form-control" value="{{ $kegiatan->waktu_selesai }}" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Bidang </label>
                                                        <input type="text" class="form-control" value="{{ $kegiatan->bidang->nama }}" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Ruangan </label>
                                                        <input type="text" class="form-control" value="{{ $kegiatan->ruangan->nama_ruangan }}" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Status</label>
                                                        <input type="text" class="form-control" value="{{ $kegiatan->status }}" readonly>
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

                                    {{-- Edit data Kegiatan --}}
                                    <div class="modal fade" id="editKegiatan{{ $kegiatan->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <form action="/admin/kegiatans/{{ $kegiatan->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Kegiatan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <div class="modal-body">

                                                        <div class="mb-3">
                                                            <label>Nama</label>
                                                            <input type="text" class="form-control" name="nama_kegiatan" value="{{ $kegiatan->nama_kegiatan }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Deskripsi</label>
                                                            <input type="text" class="form-control" name="deskripsi" value="{{ $kegiatan->deskripsi }}">
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="html5-datetime-local-input" class="col-form-label">Waktu Mulai</label>
                                                            <div class="col-md-12">
                                                                <input class="form-control" name="waktu_mulai" type="datetime-local" id="html5-datetime-local-input" />
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="html5-datetime-local-input" class="col-form-label">Waktu Selesai</label>
                                                            <div class="col-md-12">
                                                                <input class="form-control" name="waktu_selesai" type="datetime-local" id="html5-datetime-local-input" />
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Bidang </label>
                                                            <input type="text" class="form-control" name="bidang_id" value="{{ $kegiatan->bidang->nama }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Ruangan </label>
                                                            <input type="text" class="form-control" name="ruangan_id" value="{{ $kegiatan->ruangan->nama }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Status</label>
                                                            <input type="text" class="form-control" name="status" value="{{ $kegiatan->status }}">
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