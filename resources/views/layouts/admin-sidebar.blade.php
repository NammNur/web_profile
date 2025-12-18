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

        {{-- ORDERS --}}
        <div class="menu-item has-submenu">

            <a href="#" class="menu-toggle">
                🛒 Orders
                <span class="arrow">▾</span>
            </a>

            <ul class="submenu">
                <li><a href="{{ route('admin.orders.jersey') }}">Product Jersey</a></li>
                <li><a href="{{ route('admin.orders.konveksi') }}">Product Konveksi</a></li>
                <li><a href="{{ route('admin.orders.printing') }}">Product Printing</a></li>
                <li><a href="{{ route('admin.orders.logam') }}">Product Logam</a></li>
                <li><a href="{{ route('admin.orders.bordir') }}">Product Bordir</a></li>
            </ul>

        </div>
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

{{-- JS TOGGLE (TANPA NGUBAH WARNA) --}}
<script>
document.querySelectorAll('.menu-toggle').forEach(toggle => {
    toggle.addEventListener('click', function (e) {
        e.preventDefault();
        this.parentElement.classList.toggle('open');
    });
});
</script>
