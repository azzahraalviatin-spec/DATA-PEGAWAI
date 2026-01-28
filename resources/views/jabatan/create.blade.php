@extends('layouts.app')


@section('title', 'Tambah Jabatan')

@section('content')
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Tambah Jabatan</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('jabatan.store') }}" method="POST">
                        @csrf

                        <!-- Nama Jabatan -->
                        <div class="mb-3">
                            <label class="form-label">Nama Jabatan</label>
                            <input type="text"
                                   name="nama_jabatan"
                                   class="form-control @error('nama_jabatan') is-invalid @enderror"
                                   value="{{ old('nama_jabatan') }}">

                            @error('nama_jabatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Tombol -->
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('jabatan.index') }}" class="btn btn-secondary me-2">
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
    </div>

</div>
@endsection
