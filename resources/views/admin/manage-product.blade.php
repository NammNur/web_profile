<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Jersey</title>

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
            position: fixed;
            left: 0;
            top: 0;
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
            margin-left: 230px;
            padding: 25px 40px;
            width: calc(100% - 230px);
        }

        .title-bar {
            width: 300px;
            background: #1e63d3;
            padding: 10px;
            color: white;
            font-weight: bold;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 25px;
        }

        /* HEADER PRODUK */
        .header-box {
            width: 160px;
            height: 70px;
            background: #fff;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .header-box img {
            width: 55px;
        }

        .detail-wrap {
            display: flex;
            gap: 80px;
            align-items: center;
            margin-top: 10px;
            margin-bottom: 20px;
            margin-left: 15px;
        }

        .detail-text {
            font-size: 14px;
            line-height: 22px;
            position: relative;
        }

        .edit-icon {
            text-decoration: none;
            cursor: pointer;
            margin-right: 3px;
        }

        /* TEMPLATE GRID */
        .template-title {
            font-size: 15px;
            margin-left: 20px;
            margin-bottom: 10px;
        }

        .template-grid {
            display: grid;
            grid-template-columns: repeat(4, 160px);
            gap: 25px;
            margin-left: 20px;
        }

        .template-box {
            width: 160px;
            height: 130px;
            background: #f9eeee;
            border-radius: 10px;
            border: 1px solid #e5dcdc;
        }

        .footer {
            width: 100%;
            height: 55px;
            background: #1e63d3;
            border-radius: 10px;
            margin-top: 40px;
        }

        /* MODAL */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.4);
            display: none;
            justify-content: center;
            align-items: center;
        }

        .modal-box {
            background: #fff;
            width: 350px;
            padding: 20px;
            border-radius: 10px;
        }

        .modal-box h3 {
            margin-top: 0;
            font-size: 18px;
        }

        .modal-box textarea {
            width: 100%;
            height: 120px;
            padding: 10px;
            font-size: 14px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .modal-btn {
            margin-top: 12px;
            width: 100%;
            padding: 10px;
            background: #1e63d3;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .close-btn {
            background: red;
            margin-top: 8px;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- SIDEBAR -->
        <div class="sidebar">
            <div class="logo">
                <img src="{{ asset('asset/img/logo.png') }}" alt="logo">
                <h2>SKL ANDI JAYA</h2>
            </div>

            <div class="menu">
                <a href="{{ route('admin.dashboard') }}">🏠 Dashboard</a>
                <a class="active" href="{{ route('admin.products') }}">🏷️ Products</a>
                <a href="#">👥 Customers</a>
                <a href="#">🛒 Orders</a>
            </div>

           <a href="{{ route('logout') }}" class="logout">🔴 Log out</a>

        </div>

        <!-- MAIN CONTENT -->
        <div class="content">

            <div class="title-bar">Produk Jersey</div>

            <!-- HEADER ATAS -->
            <div class="detail-wrap">

                <div class="header-box">
                    <img src="{{ asset('asset/img/jersey.png') }}" alt="">
                </div>

                <!-- EDIT JENIS -->
                <div class="detail-text">
                    <span class="edit-icon" onclick="openModal('Edit Jenis Produk')">✏️</span>
                    <b>Jenis Produk :</b><br>
                    1. Jersey Futsal<br>
                    2. Jersey Basket<br>
                    3. Jersey Voli
                </div>

                <!-- EDIT BAHAN -->
                <div class="detail-text">
                    <span class="edit-icon" onclick="openModal('Edit Bahan')">✏️</span>
                    <b>Bahan :</b><br>
                    1. Premium<br>
                    2. Standart
                </div>
            </div>

            <!-- EDIT TEMPLATE -->
            <div class="template-title">
                <span class="edit-icon" onclick="openModal('Edit Template Design')">✏️</span>
                Template Design
            </div>

            <!-- TEMPLATE GRID -->
            <div class="template-grid">
                <div class="template-box"></div>
                <div class="template-box"></div>
                <div class="template-box"></div>
                <div class="template-box"></div>

                <div class="template-box"></div>
                <div class="template-box"></div>
                <div class="template-box"></div>
                <div class="template-box"></div>
            </div>

            <div class="footer"></div>

        </div>

    </div>

    <!-- MODAL -->
    <div class="modal-overlay" id="modal">
        <div class="modal-box">
            <h3 id="modalTitle">Edit</h3>

            <textarea></textarea>

            <button class="modal-btn">Simpan Perubahan</button>
            <button class="modal-btn close-btn" onclick="closeModal()">Batal</button>
        </div>
    </div>

    <script>
        function openModal(title) {
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modal').style.display = "flex";
        }

        function closeModal() {
            document.getElementById('modal').style.display = "none";
        }
    </script>

</body>

</html>
