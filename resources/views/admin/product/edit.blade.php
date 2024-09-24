@extends('layouts.admin')

@section('content')

<head>
    <title>Edit Produk</title>
    <style>
        form {
            display: contents;
        }

    </style>
</head>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../../../admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="../../../product">Produk</a></li>
            <li class="breadcrumb-item active">Edit Produk</li>
        </ol>

        @if(session()->has('status'))
        <div class="alert alert-success">
            {{ session()->get('status') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <b>Perhatian</b>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit mr-1"></i>
                Edit Produk
            </div>
            <div class="card-body">
                <div class="row">

                    <!--FORM-->
                    @foreach ($product as $p)
                    <form action="{{route('product.update', $p->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama Produk" value="{{ $p->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Keywords (Opsional)</label>
                                <input type="text" class="form-control" name="keywords" placeholder="Pisahkan dengan koma (,)" value="{{ $p->keywords }}">
                            </div>
                            <div class="form-group">
                                <label for="pict">Gambar</label><br>
                                <img src="/storage/thumbnail/product/{{ $p->pict }}" width="150px" class="img-fluid img-center">
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="text" name="price" class="form-control" placeholder="Harga" value="{{ $p->price }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Luas Tanah (m²)</label>
                                <input type="text" name="l_tanah" class="form-control" placeholder="Luas Tanah" value="{{ $p->l_tanah }}">
                            </div>
                            <div class="form-group">
                                <label for="">Luas Bangunan (m²)</label>
                                <input type="text" name="l_bangunan" class="form-control" placeholder="Luas Bangunan" value="{{ $p->l_bangunan }}">
                            </div>
                            <div class="form-group">
                                <label for="">Lokasi</label>
                                <select class="form-control" name="place">
                                    @foreach ($place as $l)
                                    <option value="{{ $l->name }}" @if($p->place == $l->name)
                                        selected
                                        @endif>{{ $l->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select class="form-control" name="category">
                                    @foreach ($category as $c)
                                    <option value="{{ $c->category }}" @if($p->category == $c->category)
                                        selected
                                        @endif>{{ $c->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kamar Mandi</label>
                                <input type="text" name="k_mandi" class="form-control" placeholder="Kamar Mandi" value="{{ $p->k_mandi }}">
                            </div>
                            <div class="form-group">
                                <label for="">Kamar Tidur</label>
                                <input type="text" name="k_tidur" class="form-control" placeholder="Kamar Tidur" value="{{ $p->k_tidur }}">
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Lantai</label>
                                <input type="text" name="j_lantai" class="form-control" placeholder="Jumlah Lantai" value="{{ $p->j_lantai }}">
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea class="form-control" id="summary-ckeditor" name="description"><?php echo $p->description; ?></textarea>
                                <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                                <script>
                                    var options = {
                                        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                                        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                                    };

                                </script>
                                <script>
                                    CKEDITOR.replace('summary-ckeditor', options);
                                </script>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-dark">Update Produk</button>
                    </form>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</main>

@endsection
