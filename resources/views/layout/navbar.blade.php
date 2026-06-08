<nav class="app-header navbar navbar-expand bg-body border-bottom">
    <div class="container-fluid d-flex flex-row align-items-center justify-content-between w-100 px-3">

        <div class="d-flex align-items-center">
            <div class="nav-item">
                <a class="nav-link p-0" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list fs-3"></i>
                </a>
            </div>
        </div>

        <div class="d-flex align-items-center">
            <div class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center gap-2 profil px-0 pe-0"
                    data-bs-toggle="dropdown">
                    <div class="text-end">
                        <h5 class="m-0 text-dark fw-bold"
                            style="font-size: 14px; font-family: 'Inter', sans-serif; line-height: 1.2;">
                            {{-- Mengambil nama dari kolom 'name' di tabel users --}}
                            {{ Auth::user()->name }}
                        </h5>
                        <p class="m-0 text-muted text-capitalize"
                            style="font-size: 11px; font-family: 'Inter', sans-serif;">
                            {{-- Mengambil role dari kolom 'role' di tabel users --}}
                            {{ Auth::user()->role }}
                        </p>
                    </div>

                    <div class="position-relative">
                        <img src="{{ asset('Soucre/src/assets/img/user2-160x160.jpg') }}" class="rounded-circle"
                            alt="User Image" style="width: 35px; height: 35px; object-fit: cover;" />
                    </div>
                </a>
            </div>
        </div>

    </div>
</nav>