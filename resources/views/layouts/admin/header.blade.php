{{-- FILE: resources/views/layouts/admin/header.blade.php --}}

<style>
    /* ================= HEADER MODERN ================= */
    .header-modern {
        background: #ffffff;
        border-radius: 18px;
        padding: 14px 20px;
        margin-bottom: 24px;
        box-shadow: 0 10px 25px rgba(0,0,0,.08);

        display: flex;
        align-items: center;
        justify-content: space-between;

        /* PENTING: jangan full viewport */
        max-width: 100%;
    }

    /* HEADER HARUS NGIKUT WRAPPER MAZER */
    .header-wrapper {
        padding: 0 1.5rem;
    }

    @media (max-width: 768px) {
        .header-wrapper {
            padding: 0 1rem;
        }
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .burger-btn {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border: none;
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .header-brand {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
        font-size: 15px;
        white-space: nowrap;
    }

    .header-right {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .header-icon {
        background: #f1f5f9;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 12px;
        position: relative;
        font-size: 17px;
        color: #475569;
    }

    .notification-badge {
        position: absolute;
        top: 6px;
        right: 6px;
        background: #ef4444;
        color: white;
        font-size: 10px;
        font-weight: 700;
        padding: 2px 6px;
        border-radius: 999px;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: linear-gradient(135deg,#4f46e5,#7c3aed);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 800;
    }

    .user-name {
        font-size: 13px;
        font-weight: 700;
        margin: 0;
        color: #1e293b;
    }

    .user-role {
        font-size: 11px;
        color: #64748b;
        margin: 0;
    }
</style>

<div class="header-wrapper">
    <header class="header-modern">

        {{-- LEFT --}}
        <div class="header-left">
            <button class="burger-btn d-block d-xl-none">
                <i class="bi bi-list"></i>
            </button>

            <h6 class="header-brand">
                <i class="bi bi-geo-alt-fill text-primary"></i>
                <span>Pariwisata Homestay Desa</span>
            </h6>
        </div>

        {{-- RIGHT --}}
        <div class="header-right">

            {{-- Notification --}}
            <button class="header-icon" title="Notifikasi">
                <i class="bi bi-bell"></i>
                <span class="notification-badge">0</span>
            </button>

            {{-- User --}}
            <div class="dropdown">
                <button class="d-flex align-items-center gap-2 dropdown-toggle"
                        data-bs-toggle="dropdown"
                        style="background:none;border:none;">
                    <div class="user-avatar">
                        {{ strtoupper(substr(session('user')->name ?? 'A',0,1)) }}
                    </div>

                    <div class="d-none d-md-block text-start">
                        <p class="user-name">{{ session('user')->name ?? 'Admin' }}</p>
                        <p class="user-role">Administrator</p>
                    </div>
                </button>

                <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                    <li class="text-center px-3 py-2">
                        <small class="text-muted">Login sebagai</small>
                        <p class="mb-0 fw-bold">{{ session('user')->name ?? 'Admin' }}</p>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2 me-2"></i> Dashboard
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{ route('user.index') }}">
                            <i class="bi bi-person me-2"></i> Data User
                        </a>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>

    </header>
</div>

<script>
    document.querySelector('.burger-btn')?.addEventListener('click', function () {
        document.querySelector('aside')?.classList.toggle('show');
    });
</script>
