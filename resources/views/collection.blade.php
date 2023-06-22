@extends('app')
@section('content')
    <style>
        a {
            color: white !important;
        }

        .product {
            background: #8F6F37;
            height: 400px;
            margin-right: 6px;
            margin-bottom: 80px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: white;
            border-radius: 10px;
        }

        .product:hover {
            background: #3A2E18;
        }
    </style>
    <div style="padding-top:120px">
        <h4>Recommendations</h4>
        <div style="display:flex;flex-wrap:wrap;margin-bottom :60px;">
            @foreach ($collections as $collection)
                <a style="text-decoration:none;"
                    href="/collection/{{ $id }}/detail/{{ $collection->id }}/{{ $collection->type }}">
                    <div class="product">
                        {{-- src="{{ asset('storage/' . $collection->image) }}" --}}
                        <img src="{{ asset('/about.webp') }}" style="height:400px;width:320px;margin:15px;border-radius:15px"
                            alt="">
                        <div style="padding:15px">
                            <h4>{{ $collection->nama }}</h4>
                            <p>Rp {{ $collection->harga }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
