<head>
    <title>Tulis Artikel - BangHM</title>
</head>

@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Tulis Artikel</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../article">Artikel</a></li>
        <li class="breadcrumb-item">Tambah Artikel</li>
    </ol>

    <form action="{{route('article.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label><b>Judul Postingan</b></label>

            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <input name="title" value="{{ old('title') }}" type="text" class="form-control" placeholder="Judul Postingan" required>
        </div>

        <div class="form-group">
            <label><b>Keywords (Opsional)</b></label>
            <input name="keywords" value="{{ old('keywords') }}" type="text" class="form-control" placeholder="Pisahkan dengan koma (,)">
        </div>
        <div class="form-group">
            <label for="kategori"><b>Kategori</b></label>
            <select class="form-control" name="category" id="kategori">
                @foreach($category as $k)
                <option value="{{ $k->category }}">{{ $k->category }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label><b>Thumbnail</b></label>

            @error('thumbnail')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <input value="{{ old('thumbnail') }}" name="thumbnail" type="file" class="form-control-file" required>
        </div>
        <div class="form-group">
            <label><b>Isi Post</b></label>

            @error('article')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <textarea class="form-control" id="summary-ckeditor" name="article">{{ old('article') }}</textarea>
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
        <button type="submit" class="btn btn-dark btn-block">Post</button>
    </form>
</div>
@endsection
