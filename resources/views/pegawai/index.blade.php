@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <h4 class="mb-4">Data Pegawai</h4>

    <div class="card shadow-sm">
        <div class="card-body">

            <!-- HEADER -->
            <div class="d-flex justify-content-between align-items-center mb-3">

<!-- SEARCH FORM -->
<form action="{{ route('pegawai.index') }}" method="GET"
      class="d-flex gap-2">

    <input type="text"
           name="search"
           value="{{ request('search') }}"
           class="form-control"
           placeholder="Cari nama, jabatan, JK, no telp..."
           style="width: 250px;">

    <button class="btn btn-primary">
        🔍 Cari
    </button>

    <a href="{{ route('pegawai.index') }}"
       class="btn btn-secondary">
        🔄 Reset
    </a>
</form>

<!-- TOMBOL TAMBAH -->
<a href="{{ route('pegawai.create') }}" class="btn btn-dark">
    Tambah Data
</a>

</div>


            <!-- TABLE -->
            <table class="table table-bordered align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Jenis Kelamin</th>
                        <th>No Telp</th>
                        <th>Alamat</th>
                        <th>Tgl Masuk</th>
                        <th>Gaji</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($pegawais as $pegawai)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $pegawai->nama_pegawai }}</td>
                        <td>{{ $pegawai->jabatan->nama_jabatan }}</td>
                        <td>{{ $pegawai->jenis_kelamin }}</td>
                        <td>{{ $pegawai->no_telp }}</td>
                        <td>{{ $pegawai->alamat }}</td>
                        <td>{{ $pegawai->tanggal_masuk }}</td>
                        <td>Rp {{ number_format($pegawai->gaji,0,',','.') }}</td>

                        <td class="text-center">
                            <a href="{{ route('pegawai.edit', $pegawai->id) }}"
                               class="btn btn-warning btn-sm">
                                ✏️
                            </a>

                            <button class="btn btn-danger btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalHapus"
                                    data-id="{{ $pegawai->id }}">
                                🗑️
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

<!-- MODAL HAPUS (SATU AJA) -->
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
                Apakah kamu yakin ingin menghapus data pegawai ini?
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

                    <button type="submit" class="btn btn-danger">
                        Yes
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- SCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    
const modalHapus = document.getElementById('modalHapus');

modalHapus.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const id = button.getAttribute('data-id');

    document.getElementById('formHapus').action = `/pegawai/${id}`;
});
</script>

@endsection
