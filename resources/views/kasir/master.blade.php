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
        
                    <li class="nav-item dropdown user-menu">
                        <a href="#"
                            class="nav-link dropdown-toggle d-flex align-items-center justify-content-between gap-2 profil"
                            data-bs-toggle="dropdown" aria-expanded="false">
        
                            <div class="text-end">
                                <h5 class="m-0 text-dark fw-bold"
                                    style="font-size: 14px; font-family: 'Inter', sans-serif; line-height: 1.2;">
                                    {{ Auth::user()->name }}</h5>
                                <p class="m-0 text-muted" style="font-size: 11px; font-family: 'Inter', sans-serif;">
                                    {{ Auth::user()->role }}
                                </p>
                            </div>
        
                            <div class="position-relative">
                                <img src="{{ asset('Soucre/src/assets/img/user2-160x160.jpg') }}" class="rounded-circle"
                                    alt="User" style="width: 35px; height: 35px; object-fit: cover;" />
                            </div>
                        </a>
        
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2"
                            style="border-radius: 10px; min-width: 160px;">
                            <li>
                                <a class="dropdown-menu-item dropdown-item d-flex align-items-center gap-2 text-danger py-2"
                                    href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    style="font-family: 'Inter', sans-serif; font-size: 14px; fw-bold;">
                                    <i class="ti ti-logout fs-5"></i>
                                    <span>Log Out</span>
                                </a>
        
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
        
                    </li>
                </ul>
            </div>  </nav>

        <main class="app-main">
            @yield('content')
        </main>

        @if(session('store'))
            <div class="position-fixed top-0 end-0 p-3" style="z-index:9999">
                <div class="toast show custom-toast border-0 text-white bg-success">
                    <div class="d-flex align-items-center">
                        <div class="toast-body d-flex align-items-center">
                            <!-- Tabler Icon: Circle Check -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check me-2"
                                width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                <path d="M9 12l2 2l4 -4" />
                            </svg>
                            {{ session('store') }}
                        </div>

                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast">
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('Soucre/dist/js/adminlte.js') }}"></script>
</body>

</html>