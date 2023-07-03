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
    </div>

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
