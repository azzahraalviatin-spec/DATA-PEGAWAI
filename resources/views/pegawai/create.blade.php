@extends('layouts.admin')

@section('title', 'Tambah Pegawai')

@section('content')
<div class="container-fluid">

    <h4 class="mb-4">Tambah Data Pegawai</h4>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('pegawai.store') }}" method="POST">
                @csrf

                <!-- Nama Pegawai -->
                <div class="mb-3">
                    <label class="form-label">Nama Pegawai</label>
                    <input type="text"
                           name="nama_pegawai"
                           class="form-control @error('nama_pegawai') is-invalid @enderror"
                           value="{{ old('nama_pegawai') }}">
                    @error('nama_pegawai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Jabatan -->
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <select name="jabatan_id"
                            class="form-select @error('jabatan_id') is-invalid @enderror">
                        <option value="">-- Pilih Jabatan --</option>
                        @foreach ($jabatans as $j)
                            <option value="{{ $j->id }}"
                                {{ old('jabatan_id') == $j->id ? 'selected' : '' }}>
                                {{ $j->nama_jabatan }}
                            </option>
                        @endforeach
                    </select>
                    @error('jabatan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin"
                            class="form-select @error('jenis_kelamin') is-invalid @enderror">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin')=='Laki-laki'?'selected':'' }}>
                            Laki-laki
                        </option>
                        <option value="Perempuan" {{ old('jenis_kelamin')=='Perempuan'?'selected':'' }}>
                            Perempuan
                        </option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- No Telepon -->
                <div class="mb-3">
                    <label class="form-label">No Telepon</label>
                    <input type="text"
                           name="no_telp"
                           class="form-control @error('no_telp') is-invalid @enderror"
                           value="{{ old('no_telp') }}">
                    @error('no_telp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat"
                              rows="3"
                              class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tanggal Masuk -->
                <div class="mb-3">
                    <label class="form-label">Tanggal Masuk</label>
                    <input type="date"
                           name="tanggal_masuk"
                           class="form-control @error('tanggal_masuk') is-invalid @enderror"
                           value="{{ old('tanggal_masuk') }}">
                    @error('tanggal_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Gaji -->
                <div class="mb-3">
                    <label class="form-label">Gaji</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="text"
                               id="gaji"
                               name="gaji"
                               class="form-control @error('gaji') is-invalid @enderror"
                               value="{{ old('gaji') }}">
                    </div>
                    @error('gaji')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('pegawai.index') }}" class="btn btn-secondary me-2">
                        Kembali
                    </a>
                    <button class="btn btn-dark">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
document.getElementById('gaji').addEventListener('input', function () {
    let angka = this.value.replace(/\D/g, '');
    this.value = new Intl.NumberFormat('id-ID').format(angka);
});
</script>
@endsection
