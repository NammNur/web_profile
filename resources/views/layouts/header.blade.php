<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKL Andi Jaya</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
</head>

<body>

<!-- ================= NAVBAR ================= -->
<header class="navbar">
    <div class="nav-container">

        <!-- BRAND -->
        <div class="brand">SKL ANDI JAYA</div>

        <!-- NAV LINKS -->
        <nav class="nav-links">
            <a href="{{ route('home') }}">HOME</a>
            <a href="{{ route('katalog') }}">KATALOG</a>
            <a href="{{ route('about') }}">ABOUT</a>
            <a href="{{ route('contact') }}">CONTACT</a>
        </nav>

        <!-- AUTH SECTION -->
        <div class="auth">

            {{-- JIKA USER SUDAH LOGIN --}}
            @auth
                <span class="user-name">
                    {{ Auth::user()->nama }}
                </span>

                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                    @csrf
                    <button type="submit" class="btn-logout">
                        Logout
                    </button>
                </form>
            @endauth

            {{-- JIKA BELUM LOGIN --}}
            @guest
                <a href="{{ route('login') }}" class="login">
                    <img src="{{ asset('asset/img/login-icon.png') }}" alt="Login">
                </a>
            @endguest

        </div>
    </div>
</header>
<!-- ================= END NAVBAR ================= -->

</body>
</html>
