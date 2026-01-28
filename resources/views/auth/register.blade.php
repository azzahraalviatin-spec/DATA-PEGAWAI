@extends('layouts.guest')

@section('content')
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="col-md-5 bg-white p-5 shadow rounded-4">
        <h4 class="fw-bold mb-3">Register</h4>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100">Register</button>

            <p class="text-center mt-3">
                Sudah punya akun?
                <a href="{{ route('login') }}">Login</a>
            </p>
        </form>
    </div>
</div>
@endsection
