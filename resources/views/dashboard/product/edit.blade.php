@extends('dashboard.layouts.main')

@section('container')
    <div class="container pb-3 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="/dashboard/product/{{ $data->id }}" enctype="multipart/form-data">
                            @method('post')
                            @csrf
                            <div class="mb-3">
                                <h1 class="h2">Edit Data</h1>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                                    required autofocus value="{{ old('nama', $data->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Kategori</label>
                                <select class="form-select" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if ($data->category_id ==$category->id)
                                            selected
                                        @endif>{{ $category->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jenis" class="form-label">Jenis</label>
                                <select class="form-select" name="category_product_id">
                                    @foreach ($cat as $catProduct)
                                        <option value="{{ $catProduct->id }}" @if ($data->category_product_id ==$catProduct->id)
                                            selected
                                        @endif>{{ $catProduct->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                @error('deskripsi')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <input id="deskripsi" type="hidden" name="deskripsi"
                                    value="{{ old('deskripsi', $data->deskripsi) }}">
                                <trix-editor input="deskripsi"></trix-editor>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Post Image</label>
                                <input type="hidden" name="oldImage" value="{{ $data->image }}">
                                @if ($data->image)
                                    <img src="{{ asset('storage/' . $data->image) }}"
                                        class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                @else
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                @endif
                                <input class="form-control" @error('image') is-invalid @enderror type="file"
                                    id="image" name="image" onchange="previewImage()">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" name="harga" id="harga"
                                    class="form-control @error('harga') is-invalid @enderror"
                                    value="{{ old('harga', $data->harga) }}">
                                @error('harga', $data->harga)
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="link_product" class="form-label">Link Product</label>
                                <input type="text" name="link_product" id="link_product"
                                    class="form-control @error('link_product') is-invalid @enderror"
                                    value="{{ old('link_product', $data->link_product) }}">
                                @error('link_product')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
