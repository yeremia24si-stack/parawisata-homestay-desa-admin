@extends('layouts.auth.app')

@section('content')
<style>
    .login-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, rgba(30, 64, 175, 0.75) 0%, rgba(37, 99, 235, 0.7) 100%),
                    url('{{ asset('assets-admin/images/bg/halaman.jpg') }}') center/cover no-repeat;
        background-attachment: fixed;
        padding: 20px;
    }

    .login-box {
        background: rgba(255, 255, 255, 0.96);
        backdrop-filter: blur(15px);
        border-radius: 20px;
        box-shadow: 0 25px 80px rgba(0, 0, 0, 0.4);
        overflow: hidden;
        max-width: 1000px;
        width: 100%;
        display: flex;
    }

    .login-info {
        background: linear-gradient(135deg, rgba(30, 64, 175, 0.92) 0%, rgba(37, 99, 235, 0.88) 100%);
        backdrop-filter: blur(10px);
        color: white;
        padding: 60px 40px;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .logo-brand {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
    }

    .logo-brand img {
        width: 60px;
        height: 60px;
        object-fit: contain;
        margin-right: 15px;
        background: rgba(255, 255, 255, 0.15);
        padding: 8px;
        border-radius: 12px;
    }

    .login-info h2 {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .login-info p {
        font-size: 16px;
        line-height: 1.8;
        opacity: 0.95;
        margin-bottom: 30px;
    }

    .feature-item {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .feature-icon {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
    }

    .feature-icon svg {
        width: 24px;
        height: 24px;
    }

    .login-form {
        padding: 60px 50px;
        flex: 1;
    }

    .brand-logo {
        text-align: center;
        margin-bottom: 30px;
    }

    .brand-logo img {
        width: 80px;
        height: 80px;
        object-fit: contain;
        margin-bottom: 15px;
    }

    .brand-logo h1 {
        color: #2563eb;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .brand-logo p {
        color: #64748b;
        font-size: 14px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #334155;
        font-weight: 500;
        font-size: 14px;
    }

    .input-wrapper {
        position: relative;
    }

    .input-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
    }

    .input-icon svg {
        width: 20px;
        height: 20px;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px 12px 45px;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 14px;
        transition: all 0.3s;
    }

    .form-control:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .btn-login {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        margin-top: 10px;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
    }

    .register-link {
        text-align: center;
        margin-top: 25px;
        color: #64748b;
        font-size: 14px;
    }

    .register-link a {
        color: #3b82f6;
        font-weight: 600;
        text-decoration: none;
    }

    .register-link a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .login-box {
            flex-direction: column;
        }
        
        .login-info {
            padding: 40px 30px;
        }
        
        .login-form {
            padding: 40px 30px;
        }
    }
</style>

<div class="login-container">
    <div class="login-box">
        <!-- Left Side - Info -->
        <div class="login-info">
            <div class="logo-brand">
                <img src="{{ asset('assets-admin/images/logo/unnamed.jpg') }}" alt="Logo Homestay">
                <div>
                    <h2 style="margin: 0; font-size: 28px;">Pariwisata & Homestay</h2>
                </div>
            </div>
            <p>Sistem Informasi Manajemen Pariwisata Homestay untuk pemberdayaan desa wisata dan peningkatan ekonomi lokal.</p>
            
            <div class="feature-item">
                <div class="feature-icon">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path>
                    </svg>
                </div>
                <div>
                    <strong>Manajemen Homestay</strong><br>
                    <small>Kelola data homestay & warga</small>
                </div>
            </div>

            <div class="feature-item">
                <div class="feature-icon">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <strong>Booking & Review</strong><br>
                    <small>Sistem pemesanan & ulasan</small>
                </div>
            </div>

            <div class="feature-item">
                <div class="feature-icon">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <strong>Destinasi Wisata</strong><br>
                    <small>Promosi tempat wisata desa</small>
                </div>
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="login-form">
            <div class="brand-logo">
                <img src="{{ asset('assets-admin/images/logo/unnamed.jpg') }}" alt="Logo Homestay">
                <h1>✨ Selamat Datang</h1>
                <p>Silakan masuk ke akun Anda</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger" style="background: #fee2e2; color: #991b1b; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success" style="background: #d1fae5; color: #065f46; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-wrapper">
                        <div class="input-icon">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                        </div>
                        <input type="email" 
                               class="form-control" 
                               id="email" 
                               name="email" 
                               placeholder="nama@email.com" 
                               value="{{ old('email') }}"
                               required 
                               autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <div class="input-icon">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="password" 
                               class="form-control" 
                               id="password" 
                               name="password" 
                               placeholder="Masukkan password"
                               required>
                    </div>
                </div>

                <div style="display: flex; align-items: center; margin-bottom: 20px;">
                    <input type="checkbox" id="remember" name="remember" style="margin-right: 8px;">
                    <label for="remember" style="margin: 0; font-size: 14px; color: #64748b; cursor: pointer;">Ingat saya</label>
                </div>

                <button type="submit" class="btn-login">
                    Masuk
                </button>
            </form>

            <div class="register-link">
                Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
            </div>
        </div>
    </div>
</div>
@endsection