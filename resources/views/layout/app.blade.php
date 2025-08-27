<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">
    <title>@yield('title', 'TPS 3R Sido Makmur')</title>
    {{-- Bootstrap dan Font --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #e8f5e9, #d0f0e8);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 999;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .logo-text {
            font-size: 20px;
            font-weight: bold;
            color: #2e7d32;
        }

        .nav a {
            text-decoration: none;
            color: #2e7d32;
            padding: 10px 15px;
            border-radius: 5px;
            margin-left: 10px;
            transition: background 0.3s;
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-right: 20px;
        }

        .nav a:hover {
            background-color: #c8e6c9;
        }

        .footer {
            background-color: #2e7d32;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }

        .social-icons img {
            width: 30px;
            margin: 0 8px;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    @stack('styles')
</head>

<body>

    <div class="header">
        <a href="{{ route('dashboard') }}" class="logo" style="text-decoration: none;">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            <span class="logo-text">TPS 3R SIDO MAKMUR</span>
        </a>
        <div class="nav">
            <a href="{{ route('kegiatan.publik') }}">KEGIATAN</a>
            <a href="{{ route('about') }}">ABOUT US</a>
            <a href="{{ route('galleries.index') }}">PRODUK</a>
            <a href="https://www.google.com/maps/place/TPS+Sidomakmur+Sidoharjo+pacitan/@-8.2072587,111.0797874,17z/data=!4m14!1m7!3m6!1s0x2e7bdf6cf2ce13a9:0x7e2832f5de55d744!2sTPS+Sidomakmur+Sidoharjo+pacitan!8m2!3d-8.2072587!4d111.0823677!16s%2Fg%2F11s47frg8x!3m5!1s0x2e7bdf6cf2ce13a9:0x7e2832f5de55d744!8m2!3d-8.2072587!4d111.0823677!16s%2Fg%2F11s47frg8x?entry=ttu&g_ep=EgoyMDI1MDQxNi4xIKXMDSoJLDEwMjExNDU1SAFQAw%3D%3D" target="_blank">LOKASI</a>
            @guest
                @if (Route::has('login'))
                    <a href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                @endif
            @else
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('LOGOUT') }} ({{ Auth::user()->name }})
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest
        </div>
    </div>

    <div style="margin-top: 60px;">
        @yield('content')
    </div>

    <div class="footer">
        <p>Kontak Person</p>
        <div class="social-icons">
            <a href="https://wa.me/6283821671510" target="_blank"><img
                    src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp"></a>
            <a href="https://www.instagram.com/tps3r_sidomakmur" target="_blank"><img
                    src="https://cdn-icons-png.flaticon.com/512/733/733558.png" alt="Instagram"></a>
            <a href="mailto:asmarani.1123020038@students.aknpacitan.ac.id"><img
                    src="https://cdn-icons-png.flaticon.com/512/281/281769.png" alt="Gmail"></a>
            <a href="https://www.youtube.com/@TPSSidoMakmur" target="_blank"><img
                    src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png" alt="YouTube"></a>
        </div>
        <p class="small">© 2025 TPS 3R Sido Makmur. All rights reserved.</p>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
