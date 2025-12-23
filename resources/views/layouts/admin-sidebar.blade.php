<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('asset/img/logo.png') }}" alt="Logo">
        <h2>SKL ANDI JAYA</h2>
    </div>

    <div class="menu">

        {{-- DASHBOARD --}}
        <a href="{{ route('admin.dashboard') }}"
           class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            📊 Dashboard
        </a>

        {{-- PRODUCTS --}}
        <a href="{{ route('admin.products') }}"
           class="{{ request()->routeIs('admin.products*') ? 'active' : '' }}">
            🏷️ Products
        </a>

        {{-- CUSTOMERS --}}
        <a href="{{ route('admin.customers') }}"
           class="{{ request()->routeIs('admin.customers') ? 'active' : '' }}">
            👥 Customers
        </a>

        {{-- ORDERS (SATU HALAMAN) --}}
        <a href="{{ route('admin.orders') }}"
   class="{{ request()->routeIs('admin.orders') ? 'active' : '' }}">
   🛒 Orders
</a>


    </div>

    {{-- LOGOUT --}}
    <div class="logout">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button style="background:none;border:none;color:red;font-weight:bold;cursor:pointer">
                🔴 Log out
            </button>
        </form>
    </div>
</div>
