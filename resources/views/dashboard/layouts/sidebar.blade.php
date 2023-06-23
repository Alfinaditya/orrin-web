{{-- Sidebar --}}
<div class="sidebar">
    <div class="logo_details">
        <img src="/logo-vector-white.png" alt="logo" style="width: 38px">
        <div class="logo_name">Orrin Parfume</div>
        <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
        <li>
            <a href="/dashboard">
                <i class='bx bx-home'></i>
                <span class="link_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li>
            <a href="/dashboard/kategori">
                <i class='bx bx-category-alt'></i>
                <span class="link_name">Kategori Parfum</span>
            </a>
            <span class="tooltip">Kategori Parfum</span>
        </li>
                <li>
            <a href="/dashboard/jenis">
                <i class='bx bx-folder'></i>
                <span class="link_name">Jenis</span>
            </a>
            <span class="tooltip">Jenis</span>
        </li>

        <li>
            <a href="/dashboard/product">
<i class='bx bx-purchase-tag'></i>
                <span class="link_name">Product</span>
            </a>
            <span class="tooltip">Product</span>
        </li>
        <li class="profile">
            <div class="profile_details">
                <div class="profile_content">
                    <div class="name">{{ auth()->user()->username }}</div>
                    <div class="designation">Admin</div>
                </div>
            </div>
            <form action="/logout" method="post">
                @csrf
                <button type="submit">
                    <i class="bx bx-log-out" id="log_out"></i>
                </button>
            </form>
        </li>
    </ul>
</div>
