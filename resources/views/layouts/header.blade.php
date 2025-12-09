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

    <!-- NAVBAR -->
    <header class="navbar">
        <div class="nav-container">
            <div class="brand">SKL ANDI JAYA</div>

            <nav class="nav-links">
                <a href="{{ route('home') }}">HOME</a>
                <a href="{{ route('katalog') }}">KATALOG</a>
                <a href="{{ route('about') }}">ABOUT</a>
                <a href="#">CONTACT</a>
            </nav>

            <div class="auth">
                <a href="{{ route('login') }}" class="login">Login/Register</a>
                <span class="user-icon">⚫</span>
            </div>
        </div>
    </header>
