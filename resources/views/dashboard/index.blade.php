@extends('dashboard.layouts.main')

@section('container')

<div class="container-fluid px-4 ">
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-7">
                <section id="breadcrumbs">
                    @include('dashboard.layouts.breadcrumbs')
                </section>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row pt-3">
            @foreach($data as $d)
            <div class="col-lg-3 mt-3">
                <a href="#" style="text-decoration: none;">
                    <div class="card position-relative" style="height: 130px; background-color: #9571F6; border: none;">
                        <div class="card-title pt-2">{{ $d->kategori }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title position-relative d-flex align-items-center justify-content-end pt-4 mb-0">20 Post</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection
