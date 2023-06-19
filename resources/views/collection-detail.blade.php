@extends('app')
@section('content')
    @include('partials.nav')
    <div style="display:flex;background:green;justify-content: center;align-items:center">
        <img src="{{ asset('storage/' . $collection->image) }}" alt="">
        <div>
            <h1>{{ $collection->nama }}</h1>
            {!! $collection->deskripsi !!}
            <p>Rp {{ $collection->harga }}</p>
            <button type="button" class="btn btn-dark">Shop Now</button>
        </div>
    </div>
@endsection
