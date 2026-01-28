<div class="d-flex flex-column h-100 p-3">

    <!-- PROFIL -->
    <div class="text-center mb-4">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
             class="rounded-circle mb-2"
             width="70">
        <h6 class="mb-0">azzahra</h6>
        <small class="text-secondary">azzahra@gmail.com</small>
    </div>

    <hr>

    <!-- MENU -->
    <ul class="nav nav-pills flex-column gap-2 flex-grow-1">

        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link text-white">
                <i class="bi bi-house me-2"></i>Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('pegawai.index') }}" class="nav-link text-white">
                <i class="bi bi-people me-2"></i>Pegawai
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('jabatan.index') }}" class="nav-link text-white">
                <i class="bi bi-briefcase me-2"></i>Jabatan
            </a>
        </li>

    </ul>

    <hr>

    <!-- LOGOUT PALING BAWAH -->
    <form method="POST" action="{{ route('logout') }}" class="mt-auto">
        @csrf
        <button type="submit" class="btn btn-danger w-100">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
        </button>
    </form>

</div>
