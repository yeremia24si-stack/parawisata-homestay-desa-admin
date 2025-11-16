<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Parawisata Homestay Desa</title>

    {{-- Memanggil semua file CSS --}}
    @include('layouts.admin.css')
</head>

<body>
    <div id="app">
        {{-- Memanggil Sidebar --}}
        @include('layouts.admin.sidebar')

        {{-- Konten Utama --}}
        <div id="main">
            {{-- Memanggil Header (Tombol Burger) --}}
            @include('layouts.admin.header')

            {{-- Ini adalah tempat konten halaman (dashboard, tabel, form) akan dimuat --}}
            @yield('content')

            {{-- Memanggil Footer --}}
            @include('layouts.admin.footer')
        </div>
    </div>

    {{-- Memanggil semua file JS --}}
    @include('layouts.admin.js')
</body>

</html>