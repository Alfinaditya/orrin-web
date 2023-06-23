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
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col">
                    <a href="/dashboard/kategori" style="text-decoration: none;">
                        <div class="card" style="height: 150px; background-color: #9571F6; border: none;">
                            <div class="card-body">
                                <h3 class="card-title pt-2">Kategori
                                </h3>
                                <h5
                                    class="card-title position-relative d-flex align-items-center justify-content-end pt-5 mb-0">
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="/dashboard/jenis" style="text-decoration: none;">
                        <div class="card" style="height: 150px; background-color: #F6C77D; border: none;">
                            <div class="card-body">
                                <h3 class="card-title pt-2">Jenis
                                </h3>
                                <h5
                                    class="card-title position-relative d-flex align-items-center justify-content-end pt-4 mb-0">
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="/dashboard/product" style="text-decoration: none;">
                        <div class="card" style="height: 150px; background-color: #F36F56; border: none;">
                            <div class="card-body">
                                <h3 class="card-title pt-2">Product
                                </h3>
                                <h5
                                    class="card-title position-relative d-flex align-items-center justify-content-end pt-4 mb-0">
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
