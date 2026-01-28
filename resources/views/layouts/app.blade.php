<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="d-flex min-vh-100">

    {{-- SIDEBAR --}}
    <div id="sidebar"
     class="bg-dark text-white p-3 d-flex flex-column"
     style="width:240px; height:100vh;">
        @include('layouts.navigation')
    </div>

    {{-- KONTEN KANAN --}}
    <div class="d-flex flex-column flex-grow-1">

        {{-- NAVBAR ATAS --}}
        <nav class="navbar navbar-light bg-white shadow-sm px-3">
            <button id="toggleSidebar" class="btn btn-outline-secondary">
                ☰
            </button>
            <span class="ms-3 fw-semibold">
                Dashboard Data Pegawai
            </span>
        </nav>

        {{-- ISI HALAMAN --}}
        <div class="container-fluid p-4 flex-grow-1">
            @yield('content')
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('toggleSidebar').onclick = function () {
        document.getElementById('sidebar').classList.toggle('d-none');
    }
</script>

</body>

</html>
