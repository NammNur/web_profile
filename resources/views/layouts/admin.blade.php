<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #e7ebef;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 230px;
            height: 100vh;
            background: white;
            padding: 20px 0;
            position: fixed;
            border-right: 2px solid #d9d9d9;
            display: flex;
            flex-direction: column;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            width: 80px;
        }

        .logo h2 {
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 25px;
            font-size: 15px;
            text-decoration: none;
            color: #333;
        }

        .menu a.active {
            background: #d9d9d9;
            border-radius: 6px;
            font-weight: bold;
        }

        .logout {
            margin-top: auto;
            padding: 20px 25px;
        }

        /* ===== MAIN ===== */
        .main {
            margin-left: 230px;
            padding: 25px 40px;
        }

        /* ===== SEARCH ===== */
        .search {
            display: flex;
            justify-content: center;
            margin-bottom: 25px;
        }

        .search input {
            width: 450px;
            padding: 10px 40px;
            border-radius: 20px;
            border: none;
            background: #d9d9d9;
            font-size: 15px;
            outline: none;
        }

        /* ===== STATS ===== */
        .stats {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
        }

        .box {
            background: white;
            padding: 20px;
            border-radius: 12px;
            width: 220px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.12);
        }

        .box-icon {
            font-size: 40px;
        }

        .box-content h4 {
            margin: 0;
            font-size: 14px;
            color: #555;
        }

        .box-content p {
            margin: 6px 0 0;
            font-size: 20px;
            font-weight: bold;
        }

        /* ===== FOOTER LINE ===== */
        .footer-line {
            width: calc(100% - 230px);
            height: 70px;
            background: #1e63b7;
            position: fixed;
            bottom: 0;
            left: 230px;
        }
    </style>
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
