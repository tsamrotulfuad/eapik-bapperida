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
                                                    <input type="text" name="nama" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Keterangan</label>
                                                    <input type="text" name="keterangan" class="form-control" required>
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
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($agendas as $agenda)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $agenda->nama }}</td>
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
                                                        <input type="text" class="form-control" value="{{ $agenda->nama }}" readonly>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Keterangan</label>
                                                        <input type="text" class="form-control" value="{{ $agenda->keterangan }}" readonly>
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