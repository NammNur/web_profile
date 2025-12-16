<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('asset/img/logo.png') }}" alt="Logo">
        <h2>SKL ANDI JAYA</h2>
    </div>

    <div class="menu">
        <a href="{{ route('admin.dashboard') }}"
           class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            📊 Dashboard
        </a>

        <a href="{{ route('admin.products') }}"
           class="{{ request()->routeIs('admin.products') ? 'active' : '' }}">
            🏷️ Products
        </a>

        <a href="{{ route('admin.customers') }}"
           class="{{ request()->routeIs('admin.customers') ? 'active' : '' }}">
            👥 Customers
        </a>

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
