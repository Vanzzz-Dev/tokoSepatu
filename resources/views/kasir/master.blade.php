<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('Soucre/src/assets/img/Logo.png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <link rel="preload" href="{{ asset('Soucre/dist/css/adminlte.css') }}" as="style" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('Soucre/dist/css/adminlte.css') }}" />
    <link rel="stylesheet" href="{{ asset('Soucre/dist/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('Soucre/dist/css/produk.css') }}">
</head>

<body class="bg-body-tertiary">
    <div class="app-wrapper">
        <nav class="app-header navbar navbar-expand bg-body border-bottom">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <img src="{{ asset('Soucre/src/assets/img/Logo.png') }}" alt="Logo" width="40px">
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto align-items-center">
                    <!-- Tombol Fullscreen (opsional) -->
                    <li class="nav-item d-none d-sm-block">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                        </a>
                    </li>

                    <!-- Bagian Profil User -->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle d-flex align-items-center justify-content-between gap-2 profil"
                            data-bs-toggle="dropdown">

                            <!-- Teks Nama di Kiri (Class d-none d-md-block SUDAH DIHAPUS agar muncul di HP) -->
                            <div class="text-end">
                                <h5 class="m-0 text-dark fw-bold"
                                    style="font-size: 14px; font-family: 'Inter', sans-serif; line-height: 1.2;">Alex
                                    Thompson</h5>
                                <p class="m-0 text-muted" style="font-size: 11px; font-family: 'Inter', sans-serif;">
                                    Store Manager</p>
                            </div>

                            <!-- Ikon Foto Profil di Kanan -->
                            <div class="position-relative">
                                <img src="{{ asset('Soucre/src/assets/img/user2-160x160.jpg') }}" class="rounded-circle"
                                    alt="User" style="width: 35px; height: 35px; object-fit: cover;" />
                            </div>

                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="app-main">
            @yield('content')
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('Soucre/dist/js/adminlte.js') }}"></script>
</body>

</html>