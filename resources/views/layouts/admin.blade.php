<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    {{-- CSS UTAMA --}}
    <link rel="stylesheet" href="{{ asset('asset/css/admin.css') }}">

    {{-- CSS SIDEBAR --}}
    <link rel="stylesheet" href="{{ asset('asset/css/sidebar.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>

    {{-- SIDEBAR --}}
    @include('layouts.admin-sidebar')

    {{-- MAIN CONTENT --}}
    <div class="main">
        @yield('content')
    </div>

    <div class="footer-line"></div>

</body>
</html>
