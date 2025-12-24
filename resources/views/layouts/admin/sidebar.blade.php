<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">

        {{-- HEADER --}}
        <div class="sidebar-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('assets-admin/images/logo/logo.png') }}" alt="Logo">
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block">
                        <i class="bi bi-x bi-middle"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- MENU --}}
        <div class="sidebar-menu">
            <ul class="menu">

                {{-- Dashboard --}}
                <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{-- Menu Utama --}}
                <li class="sidebar-title">MENU UTAMA</li>

                {{-- Destinasi Wisata --}}
                <li class="sidebar-item {{ request()->routeIs('destinasi.*') ? 'active' : '' }}">
                    <a href="{{ route('destinasi.index') }}" class="sidebar-link">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>Destinasi Wisata</span>
                    </a>
                </li>

                {{-- Homestay --}}
                <li class="sidebar-item {{ request()->routeIs('homestay.*') ? 'active' : '' }}">
                    <a href="{{ route('homestay.index') }}" class="sidebar-link">
                        <i class="bi bi-houses-fill"></i>
                        <span>Homestay</span>
                    </a>
                </li>

                {{-- Kamar Homestay --}}
                <li class="sidebar-item {{ request()->routeIs('kamar-homestay.*') ? 'active' : '' }}">
                    <a href="{{ route('kamar-homestay.index') }}" class="sidebar-link">
                        <i class="bi bi-door-open-fill"></i>
                        <span>Kamar Homestay</span>
                    </a>
                </li>

                {{-- Booking Homestay --}}
                <li class="sidebar-item {{ request()->routeIs('booking-homestay.*') ? 'active' : '' }}">
                    <a href="{{ route('booking-homestay.index') }}" class="sidebar-link">
                        <i class="bi bi-calendar-check-fill"></i>
                        <span>Booking Homestay</span>
                    </a>
                </li>

                {{-- Ulasan --}}
                <li class="sidebar-item {{ request()->routeIs('ulasan.*') ? 'active' : '' }}">
                    <a href="{{ route('ulasan.index') }}" class="sidebar-link">
                        <i class="bi bi-chat-left-text-fill"></i>
                        <span>Ulasan Wisata</span>
                    </a>
                </li>

                {{-- Master Data --}}
                <li class="sidebar-title">MASTER DATA</li>

                {{-- User --}}
                <li class="sidebar-item {{ request()->routeIs('user.*') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}" class="sidebar-link">
                        <i class="bi bi-people-fill"></i>
                        <span>Data User</span>
                    </a>
                </li>

                {{-- Warga --}}
                <li class="sidebar-item {{ request()->routeIs('warga.*') ? 'active' : '' }}">
                    <a href="{{ route('warga.index') }}" class="sidebar-link">
                        <i class="bi bi-house-fill"></i>
                        <span>Data Warga</span>
                    </a>
                </li>

                {{-- Akun --}}
                <li class="sidebar-title mt-3">Akun</li>

                {{-- Logout --}}
                <li class="sidebar-item">
                    <a href="#"
                       class="sidebar-link text-danger"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </div>

        <button class="sidebar-toggler btn x">
            <i data-feather="x"></i>
        </button>

    </div>
</div>
