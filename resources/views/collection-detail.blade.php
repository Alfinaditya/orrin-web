@extends('app')
@section('content')
    {{-- @dd($recommendations); --}}
    <div style="display:flex;justify-content:left; margin-left:20px; align-items:center;padding-top:150px;padding-bottom:30px">
        <img style="border-radius: 5px" width="400px" src="{{ asset('storage/' . $collection->image) }}" alt="">
        <div style="margin-left:100px">
            <h1>{{ $collection->nama }}</h1>
            {!! $collection->deskripsi !!}
            <p>Rp {{ $collection->harga }}</p>
            <a class="btn btn-dark" href="{{ $collection->link_product }}" target="_blank" rel="noopener noreferrer">Shop
                Now</a>
        </div>
    </div>
    <h4 style="padding-top:25px; margin-left:20px">More Recommendations</h4>
    <div style="display:flex;flex-wrap:wrap">
        @foreach ($recommendations as $recommendation)
            <div style="padding-top:25px;padding-bottom:15px;padding-right:10px;width:200px;margin-right:30px;margin-left:20px; margin-bottom:50px">
                <img width="230px" style="border-radius: 5px" src="{{ asset('storage/' . $recommendation->image) }}" alt="">
                <div style="">
                    <h4>{{ $recommendation->nama }}</h4>
                    {!! $recommendation->deskripsi !!}
                    <p>Rp {{ $recommendation->harga }}</p>
                    <a class="btn btn-dark" href="{{ $recommendation->link_product }}" target="_blank"
                        rel="noopener noreferrer">Shop
                        Now</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
