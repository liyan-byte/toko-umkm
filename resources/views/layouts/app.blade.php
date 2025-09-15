<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UMKM') }}</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
            Toko <span class="text-success">UMKMku</span>
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Navbar -->
                <ul class="navbar-nav me-auto"></ul>

                <!-- Right Navbar -->
                <ul class="navbar-nav ms-auto">
                    @guest
                        {{-- Login Dropdown --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" 
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Login
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('buyer.login') }}">Login Buyer</a></li>
                                <li><a class="dropdown-item" href="{{ route('seller.login') }}">Login Seller</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.login') }}">Login Admin</a></li>
                            </ul>
                        </li>

                        {{-- Register Dropdown --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" 
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Register
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('buyer.register') }}">Register Buyer</a></li>
                                <li><a class="dropdown-item" href="{{ route('seller.register') }}">Register Seller</a></li>
                            </ul>
                        </li>
                    @else
                        {{-- User Dropdown --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" 
                               data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                {{-- Logout menyesuaikan guard --}}
                                @if(Auth::guard('seller')->check())
                                    <li>
                                        <a class="dropdown-item" href="{{ route('seller.logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('seller-logout-form').submit();">
                                            Logout Seller
                                        </a>
                                        <form id="seller-logout-form" action="{{ route('seller.logout') }}" method="GET" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @elseif(Auth::guard('web')->check())
                                    <li>
                                        <a class="dropdown-item" href="{{ route('buyer.logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('buyer-logout-form').submit();">
                                            Logout Buyer
                                        </a>
                                        <form id="buyer-logout-form" action="{{ route('buyer.logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @elseif(Auth::guard('admin')->check())
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">
                                            Logout Admin
                                        </a>
                                        <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
