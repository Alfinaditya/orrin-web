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
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade-show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="preview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container pt-5">
        <div class="row">
            <div class="col-md-7">
                <section id="breadcrumbs">
                    @include('dashboard.layouts.breadcrumbs')
                </section>
            </div>
        </div>
    </div>


    <div class="container align-items-end">
        <div class="row">
            <div class="col my-3 d-flex justify-content-start">
                <a href="/dashboard/mens/create" class="btn btn-primary btn-sm py-1"><span data-feather="plus-circle" style="width: 18px; height: 18px;"></span>Tambah
                    Data</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <table id="primary_table" class="table bg-white rounded shadow-sm table-hover">
                    <thead>
                        <tr class="text-center align-items-center">
                            <th scope="col" width="50">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">User</th>
                            <th scope="col">Image</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
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
            url: '/dt/mens-parfume'
            , type: 'GET'
        }
        , columns: [{
                data: 'DT_RowIndex'

            }, {
                data: 'nama'
            , }, {
                data: 'username'
            , }

            , {
                data: 'image'
                , render: function(data) {
                        return `<img src="${data}" style="width:40px;">`
                    }

            , }
            , {
                data: 'kategori'

            }
            , {
                data: 'harga'

            }, {
                data: 'action'
                , render: function(data) {
                    return `
                        <a onclick="previewItems(${data})" class="badge bg-info"><span data-feather="eye" class="align-text-bottom"></span></a>
                        <a href="/dashboard/mens/${data}/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>
                        <a href="/dashboard/mens/${data}" class="badge bg-danger" onclick="return confirm('Hapus Data?')"><span data-feather="x-circle" class="align-text-bottom"></span></a>
                        `
                }

            }

        ]
    });

    function previewItems(id) {
        var myModal = new bootstrap.Modal(document.getElementById('preview'))
        myModal.show()
        $.ajax({
            url: '/ajax/mens-preview'
            , async: false
            , data: {
                id: id
            }
            , success: function(result) {
                var titleModal = $('.modal-title')
                var bodyeModal = $('.modal-body')
                titleModal.text(result.nama);
                console.log(result)
                bodyeModal.html(`
                    <div style="display:flex;justify-content:center;width:100%;">
                        <img style="width:200px; height:200px " src="${result.image}" alt="" srcset="">
                    </div>
                    <h3>${result.nama}</h3>
                    <p>${result.deskripsi}</p>
                    <h5>${result.harga}</h5>
                `)
            }
        });

    }

</script>

@endsection
