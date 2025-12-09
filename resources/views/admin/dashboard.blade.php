<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Admin Dashboard</title>
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #e7ebef;
    }

    .sidebar {
        width: 230px;
        height: 100vh;
        background: white;
        padding: 20px 0;
        position: fixed;
        border-right: 2px solid #d9d9d9;
    }

    .logo {
        text-align: center;
        margin-bottom: 30px;
    }

    .logo img {
        width: 80px;
    }

    .logo h2 {
        font-size: 18px;
        font-weight: bold;
        margin-top: 10px;
    }

    .menu {
        margin-top: 20px;
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
        border-radius: 5px;
        font-weight: bold;
    }

    .sidebar {
    display: flex;
    flex-direction: column;
}

.logout {
    margin-top: auto;
    padding: 20px 0;
}

.logout a {
    color: red;
    font-weight: bold;
    padding-left: 25px;
    display: block;
}


    /* MAIN AREA */
    .main {
        margin-left: 230px;
        padding: 20px 40px;
    }

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
    }

    .stats {
        display: flex;
        flex-wrap: wrap;
        gap: 25px;
        margin-top: 20px;
    }

    .box {
        background: white;
        padding: 20px;
        border-radius: 10px;
        width: 220px;
        display: flex;
        align-items: center;
        gap: 15px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .box-icon {
        font-size: 40px;
    }

    .box-content h4 {
        margin: 0;
        font-size: 14px;
    }

    .box-content p {
        margin: 5px 0 0;
        font-size: 20px;
        font-weight: bold;
    }

    .footer-line {
        width: 100%;
        height: 80px;
        background: #1e63b7;
        position: fixed;
        bottom: 0;
        left: 230px;
    }
</style>
</head>
<body>

<div class="sidebar">
    <div class="logo">
       <img src="{{ asset('asset/img/logo.png') }}" alt="logo" />

        <h2>SKL ANDI JAYA</h2>
    </div>

    <div class="menu">
        <a href="#" class="active">📊 Dashboard</a>
       <a href="{{ route('admin.products') }}">🏷️ Products</a>
        <a href="#">👥 Customers</a>
        <a href="#">🛒 Orders</a>
    </div>

    <div class="logout">
        <a href="{{ route('logout') }}">🔴 Log out</a>
    </div>
</div>

<div class="main">
    <div class="search">
        <input type="text" placeholder="🔍 Search" />
    </div>

    <div class="stats">
        <div class="box">
            <div class="box-icon">👤</div>
            <div class="box-content">
                <h4>Total User</h4>
                <p>12.590</p>
            </div>
        </div>

        <div class="box">
            <div class="box-icon">🛒</div>
            <div class="box-content">
                <h4>Orders</h4>
                <p>16.990</p>
            </div>
        </div>

        <div class="box">
            <div class="box-icon">💲</div>
            <div class="box-content">
                <h4>Last Week Earning</h4>
                <p>$41,983</p>
            </div>
        </div>

        <div class="box">
            <div class="box-icon">🚚</div>
            <div class="box-content">
                <h4>Products Delivered</h4>
                <p>5.970</p>
            </div>
        </div>
    </div>
</div>

<div class="footer-line"></div>

</body>
</html>
