<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ecommerce') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Theme overrides -->
    <style>
        :root {
            --bs-primary: #0ea5e9; /* sky-500 */
            --bs-primary-rgb: 14,165,233;
            --bs-secondary: #64748b; /* slate-500 */
            --bs-success: #22c55e;
            --bs-danger: #ef4444;
            --bs-warning: #f59e0b;
            --bs-info: #06b6d4;
            --bs-body-bg: #f8fafc; /* slate-50 */
            --bs-body-color: #0f172a; /* slate-900 */
            --bs-border-radius: 0.75rem;
            --bs-border-radius-lg: 1rem;
            --bs-border-radius-sm: 0.5rem;
        }
        .navbar-brand {
            font-weight: 800;
            letter-spacing: .2px;
        }
        .card {
            border: 1px solid rgba(15,23,42,.06);
            box-shadow: 0 10px 25px -10px rgba(2,6,23,.15);
        }
        .card-hover:hover { transform: translateY(-2px); box-shadow: 0 20px 30px -15px rgba(2,6,23,.2); }
        a { text-decoration: none; }
        a:hover { text-decoration: underline; }
        .footer { color: #475569; }
    </style>

</head>
<body class="d-flex flex-column min-vh-100 bg-light">
    <div id="app" class="d-flex flex-column flex-grow-1">
        <nav class="navbar navbar-expand-md navbar-light bg-white border-bottom shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto align-items-md-center">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary" href="{{ route('admin.index') }}">Admin</a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item me-2">
                                    <a class="btn btn-outline-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

        <main class="flex-fill py-4">
            @yield('content')
        </main>

        <footer class="mt-auto py-4 bg-white border-top">
            <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between footer">
                <span class="small">&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. {{ __('All rights reserved.') }}</span>
                <div class="small">
                    <span class="me-3">{{ __('Privacy') }}</span>
                    <span>{{ __('Terms') }}</span>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
