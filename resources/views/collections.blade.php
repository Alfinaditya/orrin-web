@extends('app')
@section('content')
    <style>
        a {
            color: white !important;
        }
    </style>
    <div style="padding-top:120px">
        <h4>Recommendations</h4>
        <div style="display:flex;flex-wrap:wrap;">
            @foreach ($collections as $collection)
                <a style="text-decoration:none"
                    href="/collection/{{ $collection->category_id }}/detail/{{ $collection->id }}/{{ $collection->type }}">
                    <div
                        style="background:#3A2E18;height:400px;margin-right:6px;margin-bottom:80px;display:flex;flex-direction:column;justify-content:space-between">
                        <img src="{{ asset('storage/' . $collection->image) }}" alt=""
                            style="height:400px;width:320px;margin:15px">
                        <div>
                            <h4>{{ $collection->nama }}</h4>
                            <p>Rp {{ $collection->harga }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
