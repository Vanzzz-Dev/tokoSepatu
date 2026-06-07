<aside class="app-sidebar bg-white shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="../index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{ asset('Soucre/src/assets/img/Logo.png') }}" alt="Logo" width="60px" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-bold">Step Point</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation"
                data-accordion="false" id="navigation">
            
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'current' : 'mt-1' }}">
                    <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center justify-items-center text-black">
                        <i class="ti ti-home fs-3"></i>
                        <p class="">Home</p>
                    </a>
                </li>
            
                <li class="nav-item {{ request()->routeIs('user') ? 'current' : 'mt-1' }}">
                    <a href="{{ route('user') }}" class="nav-link d-flex align-items-center justify-items-center text-black">
                        <i class="ti ti-user fs-3"></i>
                        <p class="">User</p>
                    </a>
                </li>
            
                <li class="nav-item {{ request()->routeIs('produk') ? 'current' : 'mt-1' }}">
                    <a href="{{ route('produk') }}" class="nav-link d-flex align-items-center justify-items-center text-black">
                        <i class="ti ti-box fs-3"></i>
                        <p class="">Products</p>
                    </a>
                </li>
            
                <li class="nav-item {{ request()->routeIs('category') ? 'current' : 'mt-1' }}">
                    <a href="{{ route('category') }}" class="nav-link d-flex align-items-center justify-items-center text-black">
                        <i class="ti ti-category fs-3"></i>
                        <p class="">Category</p>
                    </a>
                </li>
            
                <li class="nav-item {{ request()->routeIs('customers') ? 'current' : 'mt-1' }}">
                    <a href="{{ route('customers') }}" class="nav-link d-flex align-items-center justify-items-center text-black">
                        <i class="ti ti-users fs-3"></i>
                        <p class="">Customers</p>
                    </a>
                </li>
            
                <li class="nav-item {{ request()->routeIs('stok') ? 'current' : 'mt-1' }}">
                    <a href="{{ route('stok') }}" class="nav-link d-flex align-items-center justify-items-center text-black">
                        <i class="ti ti-building-warehouse fs-3"></i>
                        <p class="">Stock</p>
                    </a>
                </li>
            
                <li class="nav-item {{ request()->routeIs('history') ? 'current' : 'mt-1' }}">
                    <a href="{{ route('history') }}" class="nav-link d-flex align-items-center justify-items-center text-black">
                        <i class="ti ti-history fs-3"></i>
                        <p class="">History Transaction</p>
                    </a>
                </li>
            </ul>
            
            {{-- <ul>
                <li class="nav-item mt-1">
                    <a href="#" class="nav-link d-flex align-items-center justify-items-center  text-black">
                        <i class="ti ti-settings fs-3"></i>
                        <p class="">Setting</p>
                    </a>
                </li>
            </ul> --}}
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>