@extends('layouts.admin')

@section('title', 'Edit Pegawai')

@section('content')
<div class="container-fluid">

    <!-- JUDUL -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Edit Data Pegawai</h4>
    </div>

    <!-- CARD FORM -->
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <strong>Form Edit Pegawai</strong>
        </div>

        <div class="card-body">
            <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">

                    <!-- Nama Pegawai -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Pegawai</label>
                        <input type="text"
                               name="nama_pegawai"
                               class="form-control @error('nama_pegawai') is-invalid @enderror"
                               value="{{ old('nama_pegawai', $pegawai->nama_pegawai) }}">
                        @error('nama_pegawai')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jabatan -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jabatan</label>
                        <select name="jabatan_id"
                                class="form-select @error('jabatan_id') is-invalid @enderror">
                            <option value="">-- Pilih Jabatan --</option>
                            @foreach ($jabatans as $j)
                                <option value="{{ $j->id }}"
                                    {{ old('jabatan_id', $pegawai->jabatan_id) == $j->id ? 'selected' : '' }}>
                                    {{ $j->nama_jabatan }}
                                </option>
                            @endforeach
                        </select>
                        @error('jabatan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin"
                                class="form-select @error('jenis_kelamin') is-invalid @enderror">
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki"
                                {{ old('jenis_kelamin', $pegawai->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki
                            </option>
                            <option value="Perempuan"
                                {{ old('jenis_kelamin', $pegawai->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>
                        </select>
                        @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- No Telepon -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">No Telepon</label>
                        <input type="text"
                               name="no_telp"
                               class="form-control @error('no_telp') is-invalid @enderror"
                               value="{{ old('no_telp', $pegawai->no_telp) }}">
                        @error('no_telp')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat"
                                  rows="3"
                                  class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $pegawai->alamat) }}</textarea>
                        @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tanggal Masuk -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Masuk</label>
                        <input type="date"
                               name="tanggal_masuk"
                               class="form-control @error('tanggal_masuk') is-invalid @enderror"
                               value="{{ old('tanggal_masuk', $pegawai->tanggal_masuk) }}">
                        @error('tanggal_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Gaji -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Gaji</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text"
                                   id="gaji"
                                   name="gaji"
                                   class="form-control @error('gaji') is-invalid @enderror"
                                   value="{{ old('gaji', $pegawai->gaji) }}">
                        </div>
                        @error('gaji')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <!-- TOMBOL -->
                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('pegawai.index') }}" class="btn btn-secondary me-2">
                        Kembali
                    </a>
                    <button class="btn btn-warning">
                        Update Data
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>

<!-- FORMAT GAJI -->
<script>
document.getElementById('gaji').addEventListener('input', function () {
    let angka = this.value.replace(/\D/g, '');
    this.value = new Intl.NumberFormat('id-ID').format(angka);
});
</script>
@endsection
