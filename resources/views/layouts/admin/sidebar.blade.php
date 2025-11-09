<div class="bg-dark text-white p-3 vh-100" style="width:250px;">
    <h4 class="text-center">Admin Panel</h4>
    <ul class="nav flex-column mt-4">
        <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link text-white">Dashboard</a></li>
        <li class="nav-item"><a href="{{ route('user.index') }}" class="nav-link text-white">Kelola User</a></li>
        <li class="nav-item"><a href="{{ route('warga.index') }}" class="nav-link text-white">Data Warga</a></li>
        <li class="nav-item"><a href="{{ route('ulasan.index') }}" class="nav-link text-white">Ulasan Wisata</a></li>
    </ul>
</div>
