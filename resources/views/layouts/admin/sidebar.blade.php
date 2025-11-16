<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    {{-- Ganti dengan logo Anda --}}
                    <a href="{{ route('dashboard') }}"><img src="{{ asset('assets-admin/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                {{-- Dashboard --}}
                <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{-- Destinasi Wisata --}}
                <li class="sidebar-item {{ request()->routeIs('destinasi.*') ? 'active' : '' }}">
                    <a href="{{ route('destinasi.index') }}" class='sidebar-link'>
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>Destinasi Wisata</span>
                    </a>
                </li>

                {{-- Ulasan Warga --}}
                <li class="sidebar-item {{ request()->routeIs('ulasan.*') ? 'active' : '' }}">
                    <a href="{{ route('ulasan.index') }}" class='sidebar-link'>
                        <i class="bi bi-chat-left-text-fill"></i>
                        <span>Ulasan Warga</span>
                    </a>
                </li>

                {{-- Data User --}}
                <li class="sidebar-item {{ request()->routeIs('user.*') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Data User</span>
                    </a>
                </li>

                {{-- Data Warga --}}
                <li class="sidebar-item {{ request()->routeIs('warga.*') ? 'active' : '' }}">
                    <a href="{{ route('warga.index') }}" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>Data Warga</span>
                    </a>
                </li>

                {{-- Anda bisa tambahkan menu lain dari template Mazer jika perlu --}}
                {{-- <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Components</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="#">Alert</a>
                        </li>
                    </ul>
                </li> --}}

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>