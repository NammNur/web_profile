<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customers - SKL ANDI JAYA</title>

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
        font-size: 18px;
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
        border-radius: 5px;
        font-weight: bold;
    }

    .logout {
        margin-top: auto;
        padding: 20px 0;
    }

    /* ===== MAIN ===== */
    .main {
        margin-left: 230px;
        padding: 25px 40px;
    }

    h2 {
        margin-bottom: 20px;
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

    /* ===== TABLE ===== */
    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    }

    th, td {
        padding: 12px 15px;
        border-bottom: 1px solid #eee;
        font-size: 14px;
    }

    th {
        background: #f1f3f5;
        font-weight: bold;
    }

    tr:hover {
        background: #f9f9f9;
    }

    /* ===== BADGE ===== */
    .badge {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: bold;
        color: white;
        display: inline-block;
        min-width: 80px;
        text-align: center;
    }

    .aktif { background: #28a745; }
    .nonaktif { background: #dc3545; }

    .admin { background: #1e63b7; }
    .user { background: #6c757d; }

    .password {
        font-size: 12px;
        color: #666;
        text-align: center;
    }
</style>
</head>

<body>

<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('asset/img/logo.png') }}">
        <h2>SKL ANDI JAYA</h2>
    </div>

    <div class="menu">
        <a href="{{ route('admin.dashboard') }}">📊 Dashboard</a>
        <a href="{{ route('admin.products') }}">🏷️ Products</a>
        <a href="{{ route('admin.customers') }}" class="active">👥 Customers</a>
        <a href="#">🛒 Orders</a>
    </div>

    <div class="logout">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button style="background:none;border:none;color:red;font-weight:bold;cursor:pointer">
                🔴 Log out
            </button>
        </form>
    </div>
</div>

<div class="main">

    <div class="search">
        <input type="text" placeholder="🔍 Search customer">
    </div>

    <h2>👥 Customers</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Password</th>
                <th>Status</th>
                <th>Role</th>
            </tr>
        </thead>

        <tbody>
        @forelse ($customers as $index => $c)
            @php
                $status = $c->status ?? 'aktif';
                $role   = $c->role ?? 'user';
            @endphp
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $c->nama ?? '-' }}</td>
                <td>{{ $c->username ?? '-' }}</td>
                <td>{{ $c->email }}</td>
                <td>{{ $c->telepon ?? '-' }}</td>
                <td class="password">********</td>
                <td>
                    <span class="badge {{ $status == 'aktif' ? 'aktif' : 'nonaktif' }}">
                        {{ strtoupper($status) }}
                    </span>
                </td>
                <td>
                    <span class="badge {{ $role }}">
                        {{ strtoupper($role) }}
                    </span>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" style="text-align:center">
                    Data customer kosong
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>

</body>
</html>
