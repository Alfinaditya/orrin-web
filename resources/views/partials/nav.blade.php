@php
    $categories = \App\Models\Categories::all();
@endphp
@if (!Request::segment(1))
    <nav class="navbar bg-body-tertiary">
        <div class="content">
            <div class="logo container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('brand.png') }}" alt="Logo" class="d-inline-block">ORRIN<br>PARFUME
                </a>
            </div>
            <ul class="menu-list" id="menu-list">
                <div class="icon cancel-btn">
                    <i class='bx bx-x'></i>
                </div>
                <li class="nav-item"><a class="nav-link" href="/">HOME</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        COLLECTIONS
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="/collection/{{ $category->id }}">{{ $category->kategori }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="/article">ARTICLE</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="/contact">CONTACT</a></li> --}}
            </ul>
            <div class="icon menu-btn" id="menu-btn">
                <i class='bx bx-menu'></i>
            </div>
        </div>
    </nav>
@else
    <nav class="navbar navbark-dark bg-dark ">
        <div class="content">
            <div class="logo container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('brand.png') }}" alt="Logo" class="d-inline-block">ORRIN<br>PARFUME
                </a>
            </div>
            <ul class="menu-list" id="menu-list">
                <div class="icon cancel-btn">
                    <i class='bx bx-x'></i>
                </div>
                <li class="nav-item"><a class="nav-link" href="/">HOME</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        COLLECTIONS
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="/collection/{{ $category->id }}">{{ $category->kategori }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="/article">ARTICLE</a></li>
            </ul>
            <div class="icon menu-btn" id="menu-btn">
                <i class='bx bx-menu'></i>
            </div>
        </div>
    </nav>
@endif
