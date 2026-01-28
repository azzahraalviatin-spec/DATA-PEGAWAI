@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <h4 class="mb-4">Data Jabatan</h4>

    <div class="card shadow-sm">
        <div class="card-body">

            <!-- HEADER -->
            <div class="d-flex justify-content-between align-items-center mb-3">

                <!-- SEARCH -->
                <form action="{{ route('jabatan.index') }}" method="GET"
                      class="d-flex gap-2">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           class="form-control"
                           placeholder="Cari nama jabatan..."
                           style="width: 250px;">

                    <button class="btn btn-primary">
                        🔍 Cari
                    </button>

                    <a href="{{ route('jabatan.index') }}"
                       class="btn btn-secondary">
                        🔄 Reset
                    </a>
                </form>

                <!-- TOMBOL TAMBAH -->
                <a href="{{ route('jabatan.create') }}"
                   class="btn btn-dark">
                    Tambah Jabatan
                </a>

            </div>

            <!-- TABLE -->
            <table class="table table-bordered align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th width="80">No</th>
                        <th>Nama Jabatan</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @forelse ($jabatans as $jabatan)
                    <tr>
                        <td class="text-center">
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $jabatan->nama_jabatan }}
                        </td>

                        <td class="text-center">
                            <a href="{{ route('jabatan.edit', $jabatan->id) }}"
                               class="btn btn-warning btn-sm">
                                ✏️
                            </a>

                            <button class="btn btn-danger btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalHapus"
                                    data-id="{{ $jabatan->id }}">
                                🗑️
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            Data jabatan kosong
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>

<!-- ================= MODAL HAPUS ================= -->
<div class="modal fade" id="modalHapus" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Anda yakin ingin menghapus nama jabatan ini?
            </div>

            <div class="modal-footer">
                <form id="formHapus" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        No
                    </button>

                    <button type="submit"
                            class="btn btn-danger">
                        Yes
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- ================= SCRIPT ================= -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
const modalHapus = document.getElementById('modalHapus');

modalHapus.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const id = button.getAttribute('data-id');

    document.getElementById('formHapus').action = `/jabatan/${id}`;
});
</script>

@endsection
