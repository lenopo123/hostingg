<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SMK PLUS PELITA NUSANTARA</title>

    
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
        :root {
            --primary-color: #252627ff;
            --secondary-color: #3a56d4;
            --text-color: #2d3748;
            --light-bg: #f8f9fa;
        }
        
       
        body {
            font-family: 'Nunito', sans-serif;
            
            background-image: url("{{ asset('images/gedung.jpg') }}") !important;
            background-size: cover !important;          
            background-repeat: no-repeat !important;   
            background-attachment: fixed !important;   
            background-position: center !important;    
        }
       
        
        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 0.8rem 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
            padding: 0.5rem 0;
        }
        
        .navbar-nav .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
            margin: 0 0.2rem;
        }
        
        .navbar-nav .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            color: white !important;
        }
        
        .navbar-toggler {
            border: 1px solid rgba(255,255,255,0.3);
            padding: 0.25rem 0.5rem;
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border-radius: 8px;
            padding: 0.5rem;
        }
        
        .dropdown-item {
            padding: 0.6rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        
        .dropdown-item:hover {
            background-color: var(--light-bg);
        }
        
        .dropdown-item:active {
            background-color: var(--primary-color);
            color: white;
        }
        
        /* === MODIFIKASI PENTING: MAIN HARUS TRANSPARAN === */
        main {
            min-height: calc(100vh - 76px);
            background: none; /* Menghilangkan background putih default pada tag main */
        }
        /* ================================================= */
        
        @media (max-width: 768px) {
            .navbar-nav {
                padding: 1rem 0;
            }
            
            .navbar-nav .nav-link {
                margin: 0.2rem 0;
            }
            
            .dropdown-menu {
                border: none;
                box-shadow: none;
                background-color: transparent;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container">
                <img src="{{ asset('images/PENUS2.png') }}" alt="SMK Plus Pelita Nusantara" style="height: 80px;"> 
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        </ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <i class="fas fa-sign-in-alt me-1"></i>{{ __('Login') }}
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <i class="fas fa-user-plus me-1"></i>{{ __('Register') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user-circle me-1"></i>{{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-1"></i>{{ __('Logout') }}
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
            @yield('content')
        </main>
    </div>
    
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js"></script>
</body>
</html>