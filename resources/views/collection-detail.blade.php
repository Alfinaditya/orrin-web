@extends('app')
@section('content')
    <div class="container">
        <div class="row">
                <div class="col-lg-12"
                    style="display:flex;justify-content:left; margin-left:10px; align-items:center;padding-top:150px;padding-bottom:30px">
                    <img style="border-radius: 5px" width="400px" src="{{ asset('storage/' . $collection->image) }}"
                        alt="">
                    <div style="margin-left:100px">
                        <div style="justify-content: space-between">
                            <h1>{{ $collection->nama }}</h1>
                            {!! $collection->deskripsi !!}
                            <p>Rp {{ $collection->harga }}</p>
                            <a class="btn btn-dark" href="{{ $collection->link_product }}" target="_blank"
                                rel="noopener noreferrer">Shop
                                Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <h4 style="padding-top:25px;">More Recommendations</h4>
                    <div style="display:flex;flex-wrap:wrap; justify-content: space-between;">
                        @foreach ($recommendations as $recommendation)
                            <div
                                style="width:200px;margin-right:30px; margin-bottom:50px">
                                <img width="230px" style="border-radius: 5px"
                                    src="{{ asset('storage/' . $recommendation->image) }}" alt="">
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
                </div>
        </div>
    </div>
@endsection
