<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Admin</title>

    <style>
        body {
            margin: 0;
            font-family: "Segoe UI", sans-serif;
            background: #e8eaec;
        }

        .container {
            display: flex;
        }

        /* SIDEBAR */
        .sidebar {
            width: 230px;
            height: 100vh;
            background: #fff;
            border-right: 1px solid #ccc;
            padding-top: 20px;
        }

        .logo {
            text-align: center;
            padding: 10px;
        }

        .logo img {
            width: 70px;
            margin-bottom: -5px;
        }

        .logo h2 {
            font-size: 18px;
            margin-top: 5px;
            font-weight: 700;
        }

        .menu {
            margin-top: 30px;
        }

        .menu a {
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            font-size: 15px;
            color: #555;
            margin-bottom: 5px;
            transition: 0.2s;
        }

        .menu a:hover,
        .menu .active {
            background: #e4e4e4;
            border-left: 4px solid #777;
        }

        .logout {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: red;
            font-size: 15px;
        }


        /* MAIN CONTENT */
        .content {
            flex: 1;
            padding: 25px 40px;
        }

        .title-bar {
            width: 300px;
            background: #1e63d3;
            padding: 10px;
            color: white;
            font-weight: bold;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 35px;
        }

        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            justify-content: center;
        }

        .product-card {
            width: 240px;
            height: 110px;
            background: #fff;
            border-radius: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }

        .product-card img {
            width: 60px;
        }

        .product-card p {
            font-size: 17px;
            font-weight: 600;
        }

        .footer {
            width: 100%;
            height: 50px;
            background: #1e63d3;
            border-radius: 10px;
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- SIDEBAR -->
        <div class="sidebar">
            <div class="logo">
                <img src="{{ asset('img/logo.png') }}" alt="logo">
                <h2>SKL ANDI JAYA</h2>
            </div>

            <div class="menu">
                <a href="{{ route('admin.dashboard') }}">🏠 Dashboard</a>
                <a class="active" href="{{ route('admin.products') }}">🏷️ Products</a>
                <a href="#">👥 Customers</a>
                <a href="#">🛒 Orders</a>
            </div>

            <a href="#" class="logout">🔴 Log out</a>
        </div>

        <!-- MAIN CONTENT -->
        <div class="content">

            <!-- TITLE BAR -->
            <div class="title-bar">Data Produk</div>

            <!-- PRODUCT GRID -->
            <div class="product-grid">

                <div class="product-card">
                    <img src="{{ asset('img/jersey.png') }}" alt="">
                    <p>Produk Jersey</p>
                </div>

                <div class="product-card">
                    <img src="{{ asset('img/printing.png') }}" alt="">
                    <p>Produk Printing</p>
                </div>

                <div class="product-card">
                    <img src="{{ asset('img/jaket.png') }}" alt="">
                    <p>Produk Konveksi</p>
                </div>

                <div class="product-card">
                    <img src="{{ asset('img/bordir.png') }}" alt="">
                    <p>Produk Bordir</p>
                </div>

                <div class="product-card">
                    <img src="{{ asset('img/logam.png') }}" alt="">
                    <p>Produk Logam</p>
                </div>

            </div>

            <div class="footer"></div>

        </div>

    </div>

</body>

</html>
