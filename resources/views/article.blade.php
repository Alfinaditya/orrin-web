@extends('app')
@section('content')
    @include('partials.nav')
    <img style="width:400px;height:400px" src="{{ asset('home-bg.webp') }}" alt="">
    @include('contact')
@endsection
