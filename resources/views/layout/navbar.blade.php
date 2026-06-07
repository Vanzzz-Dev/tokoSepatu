<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
        </ul>
        <!--end::Start Navbar Links-->
        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            <!--begin::Navbar Search-->
            <!--begin::Fullscreen Toggle-->
            <li class="nav-item">
                <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                </a>
            </li>
            <!--end::Fullscreen Toggle-->
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center gap-3 profil" data-bs-toggle="dropdown">
                    <div class="text-end d-none d-md-block">
                        <h5 class="m-0 text-dark fw-bold" style="font-size: 15px; font-family: 'Inter', sans-serif;">Alex Thompson</h5>
                        <p class="m-0 text-muted" style="font-size: 13px; font-family: 'Inter', sans-serif;">Store Manager</p>
                    </div>
                
                    <div class="position-relative">
                        <img src="{{ asset('Soucre/src/assets/img/user2-160x160.jpg') }}"
                            class="rounded-circle" alt="User Image"
                            style="width: 40px; height: 40px; object-fit: cover;" />
                    </div>            </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!--begin::User Image-->
                    <li class="user-header text-bg-primary">
                        <img src="{{ asset('Soucre/src/assets/img/user2-160x160.jpg') }}"
                            class="user-image rounded-circle shadow" alt="User Image" />
                        <p>
                            Alexander Pierce 
                            <small>Admin</small>
                        </p>
                    </li>
                    <li class="user-footer">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                        <a href="#" class="btn btn-default btn-flat float-end">Log Out</a>
                    </li>
                    <!--end::Menu Footer-->
                </ul>
            </li>
            <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>