@extends('app')
@section('content')
    <div style="display:flex;justify-content: center;align-items:center;padding-top:150px">
        <img src="{{ asset('storage/' . $collection->image) }}" alt="">
        <div style="margin-left:100px">
            <h1>{{ $collection->nama }}</h1>
            {!! $collection->deskripsi !!}
            <p>Rp {{ $collection->harga }}</p>
            <a class="btn btn-dark" href="{{ $collection->link_product }}" target="_blank" rel="noopener noreferrer">Shop
                Now</a>
        </div>
    </div>
@endsection
