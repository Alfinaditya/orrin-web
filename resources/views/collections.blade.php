@extends('app')
@section('content')
    <style>
        h2 {
            color: white
        }
    </style>
    <div style="background:#212529;">
        <h4>Recommendations</h4>
        {{-- @dd($collections) --}}
        <div style="display:flex;">
            @foreach ($collections as $collection)
                <a style="text-decoration:none" href="/collection/{{ $collection->category_id }}/detail/{{ $collection->id }}/{{ $collection->type }}">
                    <div style="background:#3A2E18;margin-right:26px;margin-top:80px">
                        <img src="{{ asset('storage/' . $collection->image) }}" style="width: 250px" alt="">
                        <h2>{{ $collection->nama }}</h2>
                        <h2>Rp {{ $collection->harga }}</h2>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
