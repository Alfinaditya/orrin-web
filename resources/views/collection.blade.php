@extends('app')
@section('content')
    {{-- <style>
        h2 {
            color: white
        }
    </style> --}}

    {{-- <div style="background:#212529;">
        <h4>Recommendations</h4>
        <div style="display:flex;">
            @foreach ($collections as $collection)
                <a href="/collection/{{ $id }}/detail/{{ $collection->id }}/{{ $collection->type }}">
                    <div style="background:#3A2E18;margin-right:26px;">
                        <img src="{{ asset('storage/' . $collection->image) }}" alt="">
                        <h2>{{ $collection->nama }}</h2>
                        <h2>Rp {{ $collection->harga }}</h2>
                    </div>
                </a>
            @endforeach
        </div>
    </div> --}}


@php
    $categories = \App\Models\Categories::all();
@endphp

<nav class="navbar bg-body-tertiary">
    <div class="content">
        <div class="logo container-fluid">
            <a class="navbar-brand" href="#">
                <img src="brand.png" alt="Logo" class="d-inline-block">ORRIN<br>PARFUME
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
            <li class="nav-item"><a class="nav-link" href="/contact">CONTACT</a></li>
        </ul>
        <div class="icon menu-btn" id="menu-btn">
            <i class='bx bx-menu'></i>
        </div>
    </div>
</nav>
@endsection