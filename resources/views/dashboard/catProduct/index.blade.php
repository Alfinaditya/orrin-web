@extends('dashboard.layouts.main')

@section('container')

<style>
    th {
        text-align: center !important;
    }

    tr {
        vertical-align: middle;
        text-align: center;
    }

</style>

<div class="container-fluid px-4">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade-show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

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
        <div class="row">
            <div class="col my-3 d-flex justify-content-start">
                <a href="/dashboard/jenis/create" class="btn btn-primary btn-sm py-1"><span data-feather="plus-circle" style="width: 18px; height: 18px;"></span>Tambah
                    Data</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <table id="primary_table" class="table bg-white rounded shadow-sm table-hover">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" width="50">No</th>
                            <th scope="col">Kategori Parfume</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var primary_table = $('#primary_table').DataTable({
        processing: true
        , drawCallback: function(settings) {
                feather.replace();
            }

        , ajax: {
            url: '/dt/jenis-parfume'
            , type: 'GET'
        }
        , columns: [{
                data: 'DT_RowIndex',

            }
            , {
                data: 'kategori',

            }
            , {
                data: 'action'
                , render: function(data) {
                    return `
                        <a href="/dashboard/jenis/${data}/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>
                        <a href="/dashboard/jenis/${data}" class="badge bg-danger" onclick="return confirm('Hapus Data?')"><span data-feather="x-circle" class="align-text-bottom"></span></a>
                        `
                }

            }

        ]
    });

</script>



@endsection
