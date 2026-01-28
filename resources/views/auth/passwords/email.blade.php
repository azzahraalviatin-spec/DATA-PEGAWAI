@extends('layouts.guest')

@section('content')
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="col-md-5 bg-white p-5 shadow rounded-4">

        <h4 class="fw-bold mb-3">Forgot Password</h4>
        <p class="text-muted mb-4">
            Masukkan email untuk reset password
        </p>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100">
                Kirim Link Reset
            </button>

            <p class="text-center mt-3">
                <a href="{{ route('login') }}">Kembali ke Login</a>
            </p>
        </form>

    </div>
</div>
@endsection
