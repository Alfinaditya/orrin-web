@extends('app')
@section('content')
    <div style="display:flex;justify-content: center;align-items:center;padding-top:150px">
        <img src="{{ asset('storage/' . $collection->image) }}" alt="">
        <div>
            <h1>{{ $collection->nama }}</h1>
            {!! $collection->deskripsi !!}
            <p>Rp {{ $collection->harga }}</p>
            <a href="/collection/{{ $collection->id }}" class="btn btn-dark">Shop Now</a>
        </div>
    </div>
@endsection
