<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Data Pegawai</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        /* KARTU LOGIN */
        .login-card {
            max-width: 900px;
            width: 100%;
            border-radius: 16px;
            overflow: hidden;
        }

        /* SISI KIRI */
        .left-bg {
            position: relative;
            background: #f1f4fa;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        /* GAMBAR */
        .login-img {
            max-width: 75%;
            transform: translateY(-15px); /* TURUN KE BAWAH */
      

            z-index: 2;
        }

     /* GAMBAR KECIL DI ATAS */
.overlay-img {
    position: absolute;
    top: 40px;      /* jarak dari atas */
    left: 40px;     /* jarak dari kiri */
    width: 90px;    /* ukuran gambar kecil */
    z-index: 3;
}
    </style>
</head>
<body>

<div class="container min-vh-100 d-flex align-items-center justify-content-center">

    <div class="card shadow login-card border-0">
        <div class="row g-0">

            <!-- SISI KIRI (GAMBAR) -->
            <div class="col-md-6 d-none d-md-flex left-bg">
            <img src="{{ asset('images/icon.png') }}" class="overlay-img" alt="Icon">
                <img src="{{ asset('images/login.png') }}"
                     class="login-img"
                     alt="Login Illustration">
            </div>

            <!-- SISI KANAN (FORM LOGIN) -->
            <div class="col-md-6 p-5 bg-white">
                <h3 class="fw-bold mb-1">Welcome 👋</h3>
                <p class="text-muted mb-4">Login ke sistem Data Pegawai</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <input type="checkbox" name="remember"> Remember me
                        </div>
                        <a href="{{ route('password.request') }}">Lupa password?</a>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">
                        Login
                    </button>

                    <div class="text-center">
                        Belum punya akun?
                        <a href="{{ route('register') }}">Register</a>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>

</body>
</html>
