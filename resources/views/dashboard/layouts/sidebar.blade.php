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
            <a href="/dashboard/categories">
                <i class='bx bx-category-alt'></i>
                <span class="link_name">Category</span>
            </a>
            <span class="tooltip">Category</span>
        </li>

        <li>
            <a href="/dashboard/mens">
                <i class='bx bx-male-sign'></i>
                <span class="link_name">Men</span>
            </a>
            <span class="tooltip">Men</span>
        </li>
        <li>
            <a href="/dashboard/womens">
                <i class='bx bx-female-sign'></i>
                <span class="link_name">Women</span>
            </a>
            <span class="tooltip">Women</span>
        </li>
        <li>
            <a href="/dashboard/sweets">
                <i class='bx bxs-heart'></i>
                <span class="link_name">Sweet</span>
            </a>
            <span class="tooltip">Sweet</span>
        </li>
        <li>
            <a href="/dashboard/casuals">
                <i class='bx bx-hive'></i>
                <span class="link_name">Casual</span>
            </a>
            <span class="tooltip">Casual</span>
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
