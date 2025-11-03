<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Parawisata Homestay Desa</title>
    @include('admin.layouts.css')
</head>
<body class="bg-light">
    {{-- Top Bar --}}
    @include('admin.layouts.topbar')

    {{-- Main Content --}}
    <main class="container mt-4 mb-5">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('admin.layouts.footer')
    @include('admin.layouts.js')


    <a href="https://wa.me/6281234567890"
        class="btn btn-success rounded-circle shadow-lg"
        style="position: fixed; bottom: 25px; right: 25px; width: 55px; height: 55px;
               display: flex; align-items: center; justify-content: center; z-index: 1000;"
        target="_blank" title="Hubungi Admin via WhatsApp">
        <i class="fa-brands fa-whatsapp fa-xl"></i>
    </a>
</body>
</html>
