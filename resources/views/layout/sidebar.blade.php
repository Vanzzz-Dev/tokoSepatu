<aside class="app-sidebar bg-white shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="../index.html" class="brand-link">
            <img src="{{ asset('Soucre/src/assets/img/Logo.png') }}" alt="Logo" width="60px" />
            <span class="brand-text fw-bold">Step Point</span>
        </a>
    </div>
    <div class="sidebar-wrapper d-flex flex-column justify-content-between" style="height: calc(100% - 60px);">
        <nav class="mt-2 w-100">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false" id="navigation">

                <li class="nav-item {{ request()->routeIs('dashboard') ? 'current' : 'mt-1' }}">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link d-flex align-items-center justify-items-center text-black">
                        <i class="ti ti-home fs-3"></i>
                        <p class="">Home</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('users*') ? 'current' : 'mt-1' }}">
                    <a href="{{ route('users.index') }}"
                        class="nav-link d-flex align-items-center justify-items-center text-black">
                        <i class="ti ti-user fs-3"></i>
                        <p class="">User</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('categories') ? 'current' : 'mt-1' }}">
                    <a href="{{ route('categories.index') }}"
                        class="nav-link d-flex align-items-center justify-items-center text-black">
                        <i class="ti ti-category fs-3"></i>
                        <p class="">Category</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('products') ? 'current' : 'mt-1' }}">
                    <a href="{{ route('product.index') }}"
                        class="nav-link d-flex align-items-center justify-items-center text-black">
                        <i class="ti ti-box fs-3"></i>
                        <p class="">Products</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('customers') ? 'current' : 'mt-1' }}">
                    <a href="{{ route('customers.index') }}"
                        class="nav-link d-flex align-items-center justify-items-center text-black">
                        <i class="ti ti-users fs-3"></i>
                        <p class="">Customers</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('stok') ? 'current' : 'mt-1' }}">
                    <a href="{{ route('stok') }}"
                        class="nav-link d-flex align-items-center justify-items-center text-black">
                        <i class="ti ti-building-warehouse fs-3"></i>
                        <p class="">Stock</p>
                    </a>
                </li>
            </ul>
        </nav>

        {{-- Menu Log Out di Paling Bawah Sidebar --}}
        <div class="nav sidebar-menu p-3 border-top border-light-subtle">
            <ul class="nav flex-column">
                <li class="nav-item logout">
                    <a href="#" class="nav-link d-flex align-items-center text-danger fw-semibold gap-2"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ti ti-logout fs-3"></i>
                        <p class="m-0">Log Out</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</aside>