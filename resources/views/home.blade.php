@extends('app')
@section('content')
    @php
        $categories = \App\Models\Categories::all();
    @endphp
    <style>
        .carousel-control-next {
            z-index: 1;
        }
    </style>

    <div style="position: relative !important;" id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('/home1.webp') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('/home2.webp') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('/home3.webp') }}" class="d-block w-100" alt="...">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="hero" style="position: absolute;top:30%;right:0;left:0;text-align:center;">
        <div class="title col-md-12 mx-auto">
            <h1 style="color:white;text-align: center;">GET YOUR<br>BEST FRAGRANCE</h1>
        </div>
        <a class="btn btn-primary" href="/collections">
            SHOP COLLECTION
        </a>
        {{-- <button type="button" class="btn btn-primary">SHOP COLLECTION</button> --}}
    </div>

    {{-- <nav style="background:transparent !important;position:absolute;top:0;width:100%;z-index:2"
        class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <img style="width:75px;height:75px;margin-right:20px;" src="{{ asset('/brand.png') }}" alt="">
            <a class="navbar-brand" href="/">Orrin Parfume</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Collection
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($categories as $category)
                                <li>
                                    <a class="dropdown-item"
                                        href="/collection/{{ $category->id }}">{{ $category->kategori }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/article">Article</a>
                    </li>
                    <li class="nav-item dropdown">
                        @if (auth()->user())
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Welcome Back, {{ auth()->user()->name }}
                            </a>
                        @endif
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}
    <div id="about" style="width:90%;margin:auto;margin-bottom:100px;padding-top:50px">
        <h2 class="text-center" style="margin-bottom: 50px; margin-top: 50">WHY ORRIN PARFUME ?</h2>
        <div style="display:flex;align-items: center;">
            <p style="margin-right:100px">Untuk pengalaman wangi yang luar biasa dan kualitas yang terjamin. Dibuat
                dengan
                bahan-bahan terbaik dan
                teknologi
                canggih. Orrin Parfume memberikan aroma yang tahan lama dan elegan akan membuat Kamu selalu terlihat dan
                terasa
                percaya diri.</p>
            <img id="about-image" style="width:800px;height:479.57px; border-radius:8px" src="{{ asset('/home4.webp') }}" alt="">
        </div>
    </div>
@endsection
