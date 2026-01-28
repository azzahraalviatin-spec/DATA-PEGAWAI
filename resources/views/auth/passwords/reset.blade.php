@extends('layouts.guest')

@section('content')
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="col-md-5 bg-white p-5 shadow rounded-4">

        <h4 class="fw-bold mb-3">Reset Password</h4>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password Baru</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100">
                Reset Password
            </button>
        </form>

    </div>
</div>
@endsection
