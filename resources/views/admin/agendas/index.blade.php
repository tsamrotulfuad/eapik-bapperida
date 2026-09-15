@extends('admin.app')

@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 order-3 order-md-2">
            <div class="row">
                <div class="col-md-12 mb-4">

                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Manajemen Agenda</h4>

                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahAgenda">
                                <i class="bx bx-plus"></i> Tambah Agenda
                            </button>
                            <div class="modal fade" id="modalTambahAgenda" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <form action="/admin/agendas" method="POST">
                                            @csrf

                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Agenda</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">

                                                <div class="mb-3">
                                                    <label>Nama</label>
                                                    <input type="text" name="nama_agenda" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Tanggal</label>
                                                    <input type="date" name="tanggal_agenda" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Tempat</label>
                                                    <input type="text" name="tempat_agenda" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Waktu</label>
                                                    <input type="time" name="waktu" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Pengundang</label>
                                                    <input type="text" name="pengundang" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Petugas Hadir</label>
                                                    <input type="text" name="petugas_hadir" class="form-control" required>
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
                                        <th style="width: 2%;">No</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Tempat</th>
                                        <th>Waktu</th>
                                        <th>Pengundang</th>
                                        <th>Petugas Hadir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($agendas as $agenda)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $agenda->nama_agenda }}</td>
                                        <td>{{ $agenda->tanggal_agenda }}</td>
                                        <td>{{ $agenda->tempat_agenda }}</td>
                                        <td>{{ $agenda->waktu }}</td>
                                        <td>{{ $agenda->pengundang }}</td>
                                        <td>{{ $agenda->petugas_hadir }}</td>
                                        <td>
                                            <!-- Show -->
                                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showAgenda{{ $agenda->id }}">
                                                <i class="bx bx-show"></i>
                                            </button>

                                            <!-- Edit -->
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editAgenda{{ $agenda->id }}">
                                                <i class="bx bx-edit"></i>
                                            </button>

                                            <!-- Delete -->
                                            <form action="/admin/agendas/{{ $agenda->id }}" method="POST" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    {{-- Show data agenda --}}
                                    <div class="modal fade" id="showAgenda{{ $agenda->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail Agenda</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="mb-3">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" value="{{ $agenda->nama_agenda }}" readonly>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Tanggal</label>
                                                        <input type="text" class="form-control" value="{{ $agenda->tanggal_agenda }}" readonly>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Tempat</label>
                                                        <input type="text" class="form-control" value="{{ $agenda->tempat_agenda }}" readonly>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Tempat</label>
                                                        <input type="text" class="form-control" value="{{ $agenda->tempat_agenda }}" readonly>
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

                                    {{-- Edit data agenda --}}
                                    <div class="modal fade" id="editAgenda{{ $agenda->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <form action="/admin/agendas/{{ $agenda->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Agenda</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <div class="modal-body">

                                                        <div class="mb-3">
                                                            <label>Nama</label>
                                                            <input type="text" name="nama" class="form-control" value="{{ $agenda->nama }}" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label>keterangan</label>
                                                            <input type="text" name="keterangan" class="form-control" value="{{ $agenda->keterangan }}" required>
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
