<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Bina Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0f172a;
            color: #e2e8f0;
        }
        .sidebar {
            background-color: #1e293b;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
            width: 250px;
        }
        .sidebar a {
            color: #cbd5e1;
            display: block;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #2563eb;
            color: #fff;
        }
        .content {
            margin-left: 260px;
            padding: 30px;
        }
        .card {
            background-color: #1e293b;
            border: none;
            border-radius: 12px;
            color: #f1f5f9;
        }
        .chart-container {
            height: 300px;
        }
    </style>
</head>
<body>
    @include('layout.sidebar')

    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('scripts')
</body>
</html>
