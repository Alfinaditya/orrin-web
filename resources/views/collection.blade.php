@extends('app')
@section('content')
    <style>
        h2 {
            color: white
        }
    </style>
    <div style="background:#212529;">
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
    </div>
@endsection
