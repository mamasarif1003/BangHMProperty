<head>
    <title>Edit Artikel - BangHM</title>
</head>

@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Edit Artikel</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../article">Artikel</a></li>
        <li class="breadcrumb-item">Edit Artikel</li>
    </ol>

    @foreach ($article as $a)

    <form action="{{route('article.update', $a->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}

        <div class="form-group">
            <label><b>Judul Postingan</b></label>

            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <input name="title" value="{{ $a->title }}" type="text" class="form-control" placeholder="Judul Postingan" required>
        </div>
        <div class="form-group">
            <label><b>Keywords (Opsional)</b></label>
            <input name="keywords" value="{{ $a->keywords }}" type="text" class="form-control" placeholder="Pisahkan dengan koma (,)">
        </div>
        <div class="form-group">
            <label for="kategori"><b>Kategori</b></label>
            <select class="form-control" name="category">
                @foreach ($category as $k)
                <option value="{{ $k->category }}" @if($a->category == $k->slug)
                    selected
                    @endif>{{ $k->category }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label><b>Thumbnail</b> (Persegi) </label>

            @error('thumbnail')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="custom-file">
                <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                <label class="custom-file-label" for="thumbnail">{{ $a->thumbnail }}</label>
            </div>
        </div>
        <div class="form-group">
            <label><b>Isi Post</b></label>

            @error('article')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <textarea class="form-control" id="summary-ckeditor" name="article">{{ $a->article }}</textarea>
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
        <button type="submit" class="btn btn-dark btn-block">Update</button>
    </form>

    @endforeach

    @section('js')
    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

    </script>
    @endsection

</div>
@endsection
