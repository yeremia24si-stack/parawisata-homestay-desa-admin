<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard - Bina Desa</title>
<link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets-admin/vendors/bootstrap-icons/bootstrap-icons.css') }}">
<link rel="stylesheet" href="{{ asset('assets-admin/css/app.css') }}">
</head>
<body>
<div id="app">
  <div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
      <div class="sidebar-header">
        <div class="logo">
          <a href="{{ route('admin.dashboard') }}"><h4 class="text-success">🏘️ Bina Desa</h4></a>
        </div>
      </div>
      <div class="sidebar-menu">
        <ul class="menu">
          <li class="sidebar-title">Menu</li>
          <li class="sidebar-item active">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link"><i class="bi bi-grid-fill"></i><span>Dashboard</span></a>
          </li>
          <li class="sidebar-item">
            <a href="{{ route('admin.user.index') }}" class="sidebar-link"><i class="bi bi-person-fill"></i><span>Data User</span></a>
          </li>
          <li class="sidebar-title">Akun</li>
          <li class="sidebar-item">
            <a href="{{ route('admin.logout') }}" class="sidebar-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="bi bi-box-arrow-right"></i><span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" class="d-none">@csrf</form>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div id="main">
    <header class="mb-3">
      <a href="#" class="burger-btn d-block d-xl-none"><i class="bi bi-justify fs-3"></i></a>
    </header>

    <div class="page-heading">
      <h3>Dashboard</h3>
    </div>

    <div class="page-content">
      <div class="container">
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
          <div class="col-md-3">
            <div class="card p-3">
              <h6>Total User</h6>
              <h3>{{ $userCount ?? 0 }}</h3>
            </div>
          </div>
          <div class="col-md-9">
            <div class="card p-3">
              <h5>Selamat datang, {{ session('admin_name') }}</h5>
              <p>Selamat mengelola data Bina Desa - Ulasan Wisata.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <div class="footer clearfix mb-0 text-muted">
        <div class="float-start"><p>2025 &copy; Bina Desa</p></div>
      </div>
    </footer>
  </div>
</div>

<script src="{{ asset('assets-admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets-admin/js/main.js') }}"></script>
</body>
</html>
