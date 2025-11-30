<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>kasir</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #0f0f0fff;
            --secondary-color: #3a56d4;
            --light-bg: #f8f9fa;
            --success-color: #198754;
            --info-color: #0dcaf0;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            background-image: url("{{ asset('images/gedung.jpg') }}") !important;
            background-size: cover !important;
            background-position: center !important;
            background-attachment: fixed !important;
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
        }
        
        .navbar-nav .nav-link {
            color: rgba(0, 0, 0, 0.9) !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        
        .navbar-nav .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            color: white !important;
            transform: translateY(-2px);
        }
        
        .nav-menu {
            background: #0267ffff ; 
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .nav-menu .btn {
            border-radius: 8px;
            font-weight: 500;
            margin: 0.2rem;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        /* Animasi untuk semua tombol */
        .nav-menu .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        
        .nav-menu .btn:hover::before {
            left: 100%;
        }
        
        .nav-menu .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        .nav-menu .btn:active {
            transform: translateY(-1px);
        }
        
        /* Warna tombol navigasi - semua biru dengan teks hitam */
        .btn-beranda {
            background-color: #3a56d4;
            color: #000000 !important;
            border: 2px solid #3a56d4;
            font-weight: 600;
        }
        
        .btn-beranda:hover {
            background-color: #2a46c4;
            color: #000000 !important;
        }
        
        .btn-pengguna {
            background-color: #4d69e8;
            color: #000000 !important;
            border: 2px solid #4d69e8;
            font-weight: 600;
        }
        
        .btn-pengguna:hover {
            background-color: #3d59d8;
            color: #000000 !important;
        }
        
        .btn-produk {
            background-color: #5a76f0;
            color: #000000 !important;
            border: 2px solid #5a76f0;
            font-weight: 600;
        }
        
        .btn-produk:hover {
            background-color: #4a66e0;
            color: #000000 !important;
        }
        
        .btn-transaksi {
            background-color: #6a83f8;
            color: #000000 !important;
            border: 2px solid #6a83f8;
            font-weight: 600;
        }
        
        .btn-transaksi:hover {
            background-color: #5a73e8;
            color: #000000 !important;
        }
        
        .btn-laporan {
            background-color: #7a90ff;
            color: #000000 !important;
            border: 2px solid #7a90ff;
            font-weight: 600;
        }
        
        .btn-laporan:hover {
            background-color: #6a80ef;
            color: #000000 !important;
        }
        
        .btn-active {
            box-shadow: 0 0 0 2px rgba(255,255,255,0.8), 0 0 0 4px currentColor;
            transform: scale(1.05);
        }
        
        /* Tombol Logout yang diperbaiki */
        .btn-logout {
            background: linear-gradient(135deg, #002fffff, #47a6ffff);
            color: #000000 !important;
            border: 2px solid #ffffffff;
            font-weight: 600;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-logout::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(247, 0, 0, 0.4), transparent);
            transition: left 0.5s;
        }
        
        .btn-logout:hover::before {
            left: 100%;
        }
        
        .btn-logout:hover {
            background: linear-gradient(135deg, #ff5252, #ff2e4a);
            color: #000000 !important;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 71, 87, 0.4);
        }
        
        .btn-logout:active {
            transform: translateY(-1px);
        }
        
        .navbar-toggler {
            border: 1px solid rgba(255, 255, 255, 1);
            transition: all 0.3s ease;
        }
        
        .navbar-toggler:hover {
            transform: scale(1.1);
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        
        .dropdown-item {
            padding: 0.6rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        
        .dropdown-item:hover {
            background-color: var(--light-bg);
            transform: translateX(5px);
        }
        
        main {
            min-height: calc(100vh - 76px);
        }

        /* ===== CSS UNTUK BERANDA ===== */

        /* Widget Cards */
        .widget-card {
            border: none;
            border-radius: 20px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            overflow: hidden;
            position: relative;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .widget-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--card-color), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .widget-card:hover::before {
            opacity: 1;
        }

        .widget-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }

        .widget-user { --card-color: #4e73df; }
        .widget-product { --card-color: #1cc88a; }
        .widget-transaction { --card-color: #f6c23e; }
        .widget-stock { --card-color: #e74a3b; }

        .widget-card:hover .widget-count {
            transform: scale(1.1);
        }

        .widget-count {
            font-size: 2.5rem;
            font-weight: 800;
            transition: all 0.3s ease;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .widget-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.25rem;
        }

        .widget-subtitle {
            font-size: 0.85rem;
            color: #718096;
        }

        .widget-icon {
            font-size: 3rem;
            opacity: 0.8;
            transition: all 0.3s ease;
            filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.1));
        }

        .widget-card:hover .widget-icon {
            transform: scale(1.2) rotate(5deg);
            opacity: 1;
        }

        .widget-user .widget-icon { color: #4e73df; }
        .widget-product .widget-icon { color: #1cc88a; }
        .widget-transaction .widget-icon { color: #f6c23e; }
        .widget-stock .widget-icon { color: #e74a3b; }

        /* Welcome Card - DIPERBAIKI */
        .welcome-card {
            border: none;
            border-radius: 20px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
        }

        .welcome-card .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            border: none;
            padding: 1.2rem 1.5rem;
            display: flex;
            align-items: center;
        }

        .welcome-card .card-header .card-title {
            display: flex;
            align-items: center;
            margin-bottom: 0;
            font-size: 1.2rem;
            font-weight: 600;
            color: white;
        }

        .welcome-card .card-header .fa-star {
            font-size: 1.1rem;
            margin-right: 0.75rem;
            filter: drop-shadow(0 0 3px rgba(255,255,255,0.8));
            vertical-align: middle;
            color: #FFD700;
        }

        .welcome-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
        }

        .text-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Progress Bar Animation */
        .progress {
            border-radius: 10px;
            background-color: rgba(233, 236, 239, 0.5);
            overflow: hidden;
            backdrop-filter: blur(5px);
        }

        .progress-bar {
            border-radius: 10px;
            transition: width 2s ease-in-out;
        }

        .widget-card:hover .progress-bar {
            animation: progressAnimation 1.5s ease-in-out;
        }

        @keyframes progressAnimation {
            0% { transform: scaleX(0); }
            50% { transform: scaleX(1.1); }
            100% { transform: scaleX(1); }
        }

        /* Floating Animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .widget-card {
            animation: float 6s ease-in-out infinite;
        }

        .widget-card:nth-child(2) { animation-delay: 0.2s; }
        .widget-card:nth-child(3) { animation-delay: 0.4s; }
        .widget-card:nth-child(4) { animation-delay: 0.6s; }

        /* Dashboard Header */
        .dashboard-header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Glassmorphism Effect untuk konten */
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .glass-card:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        /* Text Shadow untuk keterbacaan yang lebih baik */
        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        /* Responsive Design untuk Beranda */
        @media (max-width: 768px) {
            .widget-count {
                font-size: 2rem;
            }
            
            .widget-icon {
                font-size: 2rem;
            }
            
            .widget-card {
                margin-bottom: 1rem;
            }

            .welcome-card .card-header {
                padding: 1rem 1.2rem;
            }

            .welcome-card .card-header .card-title {
                font-size: 1.1rem;
            }

            .welcome-card .card-header .fa-star {
                font-size: 1rem;
                margin-right: 0.5rem;
            }
        }
        
        @media (max-width: 768px) {
            .nav-menu .btn {
                width: 100%;
                margin: 0.2rem 0;
            }
            
            .navbar-nav {
                padding: 1rem 0;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                 <img src="{{ asset('images/PENUS2.png') }}" alt="SMK Plus Pelita Nusantara" style="height: 80px;"> 
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <!-- Optional: Add menu items here -->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item btn-logout" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <!-- Navigation Menu -->
            <div class="container">
                <div class="nav-menu">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex flex-wrap">
                                <a href="{{ route('home') }}" wire:navigate
                                   class="btn btn-beranda {{ request()->routeIs('home') ? 'btn-active' : '' }}">
                                    Beranda
                                </a>
                                <a href="{{ route('user') }}" wire:navigate
                                   class="btn btn-pengguna {{ request()->routeIs('user') ? 'btn-active' : '' }}">
                                    Pengguna
                                </a>
                                <a href="{{ route('produk') }}" wire:navigate
                                   class="btn btn-produk {{ request()->routeIs('produk') ? 'btn-active' : '' }}">
                                    Produk
                                </a>
                                <a href="{{ route('transaksi') }}" wire:navigate
                                   class="btn btn-transaksi {{ request()->routeIs('transaksi') ? 'btn-active' : '' }}">
                                    Transaksi
                                </a>
                                <a href="{{ route('laporan') }}" wire:navigate
                                   class="btn btn-laporan {{ request()->routeIs('laporan') ? 'btn-active' : '' }}">
                                    Laporan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            {{ $slot }}
        </main>
    </div>
</body>
</html>