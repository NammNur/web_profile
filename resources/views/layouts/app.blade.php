<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKL ANDI JAYA</title>

    {{-- CSS Utama --}}
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/katalog.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/contact.css') }}">
</head>
<body>

    {{-- NAVBAR --}}
    @include('layouts.header')

    {{-- CONTENT HALAMAN --}}
    <main style="margin-top: 50px;">
        @yield('content')
    </main>

</body>
</html>
