<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            overflow: hidden;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            height: 100vh;
            background: #1f2937;
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            display: flex;
            flex-direction: column;
            z-index: 1000;
            transition: width 0.3s ease, transform 0.3s ease;
        }

        /* SIDEBAR KECIL */
        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar.collapsed .menu-text {
            display: none;
        }

        .sidebar-header {
            padding: 16px 20px;
            font-weight: bold;
            border-bottom: 1px solid #374151;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar a {
            color: #e5e7eb;
            text-decoration: none;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-radius: 6px;
            font-size: 14px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #374151;
        }

        .sidebar-menu {
            padding: 12px;
            flex-grow: 1;
            margin-top: 30px; /* bikin menu turun dikit */
        }

        .sidebar-footer {
            padding: 12px;
        }

        .logout-btn {
            width: 100%;
            background: #dc3545;
            border: none;
            color: white;
            padding: 10px;
            border-radius: 6px;
            font-size: 14px;
        }

        /* CONTENT */
        .main-content {
            margin-left: 260px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            transition: margin-left 0.3s ease;
        }

        .main-content.collapsed {
            margin-left: 70px;
        }

        .topbar {
            background: white;
            padding: 10px 16px;
            border-bottom: 1px solid #ddd;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .content-area {
            flex-grow: 1;
            overflow-y: auto;
            padding: 20px;
        }

        /* MOBILE */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content,
            .main-content.collapsed {
                margin-left: 0;
            }
        }
.user-box {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 12px;
    background: rgba(255,255,255,0.08);
}

.user-avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
}

.user-name {
    font-weight: 600;
    color: #fff;
}

.user-role {
    font-size: 12px;
    color: #c7d2fe;
}

    </style>
</head>
<body>

<!-- SIDEBAR -->
<div id="sidebar" class="sidebar">

    <div class="sidebar-header">
        <i class="bi bi-buildings"></i>
        <span class="menu-text">Sistem Informasi Data Pegawai</span>
    </div>

    <div class="sidebar-menu">
        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            <span class="menu-text">Dashboard</span>
        </a>

        <a href="{{ route('pegawai.index') }}"
           class="{{ request()->routeIs('pegawai.*') ? 'active' : '' }}">
            <i class="bi bi-people"></i>
            <span class="menu-text">Data Pegawai</span>
        </a>

        <a href="{{ route('jabatan.index') }}"
           class="{{ request()->routeIs('jabatan.*') ? 'active' : '' }}">
            <i class="bi bi-briefcase"></i>
            <span class="menu-text">Jabatan</span>
        </a>
    </div>
<!-- USER PROFILE SIDEBAR -->
<div class="user-box">
    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=6366f1&color=fff"
         class="user-avatar">

    <div class="user-info">
        <div class="user-name">
            {{ auth()->user()->name }}
        </div>
        <div class="user-role">
            Akun Login
        </div>
    </div>
</div>


    <div class="sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-btn">
                <i class="bi bi-box-arrow-right me-1"></i>
                <span class="menu-text">Logout</span>
            </button>
        </form>
    </div>

</div>

<!-- CONTENT -->
<div class="main-content" id="mainContent">

    <!-- TOPBAR -->
    <div class="topbar">
        <button id="btnToggle" class="btn btn-outline-dark btn-sm">
            <i class="bi bi-list"></i>
        </button>

        <strong class="ms-2">Dashboard</strong>
        <span class="ms-auto text-muted" id="tanggal"></span>
    </div>

    <!-- ISI -->
    <div class="content-area">
        @yield('content')
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const btnToggle = document.getElementById('btnToggle');
    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('mainContent');

    btnToggle.addEventListener('click', () => {
        if (window.innerWidth <= 768) {
            // MODE HP
            sidebar.classList.toggle('show');
        } else {
            // MODE DESKTOP
            sidebar.classList.toggle('collapsed');
            main.classList.toggle('collapsed');
        }
    });

    // TANGGAL OTOMATIS
    function updateTanggal() {
        const tgl = new Date().toLocaleDateString('id-ID', {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });
        document.getElementById('tanggal').innerText = tgl;
    }

    updateTanggal();
    setInterval(updateTanggal, 60000);
</script>

</body>
</html>
