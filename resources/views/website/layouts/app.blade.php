<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar Seller -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('seller.dashboard') }}">🛒 Seller Panel</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('seller.dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('seller.product') }}">Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('seller.setting') }}">Setting</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('seller.report') }}">Laporan</a></li>
                    <li class="nav-item"><a class="nav-link text-danger" href="{{ route('seller.logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
