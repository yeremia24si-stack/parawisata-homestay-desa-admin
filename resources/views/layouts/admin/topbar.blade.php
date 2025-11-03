<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-white" href="#">
            <i class="fa-solid fa-hotel me-2"></i>Parawisata Homestay
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item"><a class="nav-link text-white" href="{{ route('modulA.index') }}"><i class="fa-solid fa-map-location-dot me-1"></i>Modul A</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('modulB.index') }}"><i class="fa-solid fa-seedling me-1"></i>Modul B</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('user.index') }}"><i class="fa-solid fa-users me-1"></i>User</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('warga.index') }}"><i class="fa-solid fa-person me-1"></i>Warga</a></li>

                {{-- Dropdown Profil --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user-circle me-1"></i> Admin
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-id-card me-2"></i>Profil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="{{ route('login') }}"><i class="fa-solid fa-right-from-bracket me-2"></i>Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
