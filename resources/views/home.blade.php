@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
            <div class="position-sticky">
                <ul class="nav flex-column text-white p-3">
                    <li class="nav-item border-bottom pb-2 mb-2">
                        <a class="nav-link text-white {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="fa-solid fa-house-user" style="color:white"></i>  Dashboard
                        </a>
                    </li>

                    <li class="nav-item border-bottom pb-2 mb-2">
                        <a class="nav-link text-white {{ request()->is('stocks*') ? 'active' : '' }}" href="{{ route('stocks.index') }}">
                            <i class="fa-solid fa-box-archive" style="color: white"></i>  Stock
                        </a>
                    </li>

                     <li class="nav-item border-bottom pb-2 mb-2">
                        <a class="nav-link text-white {{ request()->is('categories*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                            <i class="fa-solid fa-list" style="color: white"></i>  Produk
                        </a>
                    </li>

                    <li class="nav-item border-bottom pb-2 mb-2">
                        <a class="nav-link text-white {{ request()->is('recaps*') ? 'active' : '' }}" href="{{ route('recaps.index') }}">
                            <i class="fa-solid fa-file" style="color: white"></i>  Recap
                        </a>
                    </li>

                    <li class="nav-item border-bottom pb-2 mb-2">
                        <a class="nav-link text-white {{ request()->is('kegiatans*') ? 'active' : '' }}" href="{{ route('kegiatans.index') }}">
                            <i class="fa-solid fa-person-running" style="color: white"></i>  Kegiatan
                        </a>
                    </li>

                    <li class="nav-item border-bottom pb-2 mb-2">
                        <a class="nav-link text-white {{ request()->is('penjualan*') ? 'active' : '' }}" href="{{ route('penjualan.index') }}">
                            <i class="fa-solid fa-cart-shopping" style="color: white"></i>  Penjualan
                        </a>
                    </li>

                    <li class="nav-item border-bottom pb-2 mb-2">
                        <a class="nav-link text-white {{ request()->is('rekappenjualan*') ? 'active' : '' }}" href="{{ route('rekappenjualan.index') }}">
                            <i class="fa-solid fa-download" style="color: white"></i> Rekap Penjualan
                        </a>
                    </li>

                    @if(Auth::user()->role == 'admin')
                        <li class="nav-item border-bottom pb-2 mb-2">
                            <a class="nav-link text-white {{ request()->is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                                <i class="fa-solid fa-users" style="color:white"></i>  Pengguna
                            </a>
                        </li>
                    @endif

                    <li class="nav-item mt-3">
                        <a class="nav-link text-white" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt" style="color:white"></i>  Logout
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="p-4 col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex align-items-center justify-content-between py-3 px-3 rounded mb-3"
                 style="background: linear-gradient(to right, #4CAF50, #81C784); box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo TPS 3R" height="60" class="me-3 rounded-circle">
                    <h1 class="h3 mb-0 text-white">TPS 3R Sido Makmur</h1>
                </div>
                <div>
                    <h5 class="mb-0 text-white">Selamat datang, {{ Auth::user()->name }} <i class="fa fa-hands-clapping" style="color:white"></i></h5>
                </div>
            </div>
            <div class="card mt-3 shadow-sm">
                <div class="card-body">
                    <h3 class="text-success">INFORMASI PENGGUNA</h3>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Role:</strong> {{ Auth::user()->role }} <i class="fa fa-crown" style="color:#4CAF50"></i></p>
                    <p><strong>Login Terakhir:</strong> {{ Auth::user()->updated_at }}</p>
                </div>
            </div>
        </main>
    </div>
</div>

<style>
    #sidebar {
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        padding-top: 20px;
        border-right: 1px solid #444;
    }

    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 6px;
    }

    .nav-link.active {
        font-weight: bold;
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 6px;
    }

    body {
    position: relative;
}

body::after {
    content: "";
    background: url('{{ asset('images/leaf-corner1.png') }}') no-repeat bottom right;
    background-size: 150px;
    opacity: 2;
    position: fixed;
    bottom: 10px;
    right: 10px;
    width: 200px;
    height: 200px;
    pointer-events: none;
    z-index: 999;
}

</style>
@endsection
