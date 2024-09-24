@extends('layouts.main')

@section('content')

@foreach($article as $p)

@section('head')
<title>{{ $p->title }}</title>
<meta name="description" content="<?php echo strip_tags($p->article); ?>">
<meta name="keywords" content="{{ $p->keywords }}">
<meta name="author" content="{{ $p->writer }}">
<style>
    form {
        display: contents;
    }

    i {
        color: black;
    }

    #article img {
        width: 60%;
    }

    .contentcrd img {
        width: 100%;
        height: 13vw;
        object-fit: cover;
    }    

    .contentcrd h6 {
        color: black;
    }

    @media only screen and (max-width: 767px) {
        .contentcrd img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        #article img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    }

</style>
@endsection

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color: white !important;">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            @foreach($artcategory as $c)
            @if($p->category == $c->category)
            <li class="breadcrumb-item"><a href="../../../kategori/artikel/{{ $c->slug }}">{{ $c->category }}</a></li>
            @endif
            @endforeach
            <li class="breadcrumb-item active" aria-current="page">{{ $p->title }}</li>
        </ol>
    </nav>

    <!-- overview produk -->
    <div class="container">
        <div class="row mb-5">
            <center>
                <div class="col-md-10 ml-3">
                    <img src="{{ url('../../storage/thumbnail/article/'.$p->thumbnail) }}" class="img-fluid">
                </div>
            </center>
        </div>

        <div class="container-fluid">
            <div class="col-md-10 takedown ml-3" id="article">
                <h1 class="produkheader h4 mt-3">{{ $p->title }}</h1>
                <h6 class="h5 mt-n2">Diposting oleh {{ $p->writer }}</h6>
                <h6 class="mt-n2">{{ $p->created_at }}</h6>
                <hr>
                <p id="desc" class="p text-justify">
                    <?php echo $p->article; ?>
                </p>
            </div>
        </div>

    </div>

    <!-- judul content kedua -->
    <div class="container mt-5 fcontent">
        <div class="d-flex justify-content-center">
            <h6 class="h2">Artikel Terbaru</h6>
        </div>
    </div>

    <div class="container">
        <!-- content project -->
        <div class="row">
            @foreach($latestp as $l)
            <div class="col-md-3 my-3">
                <a class="nav-link" href="../../../artikel/{{ $l->slug }}">
                    <div class="contentcrd">
                        <img class="card-img-top" src="{{ url('../../storage/thumbnail/article/'.$l->thumbnail) }}" alt="{{ $l->name }}">
                        <div class="mt-2">
                            <h6 class="card-title">{{ $l->title }}</h6>
                            <p class="my-1 card-text a">{{ $l->category }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endforeach

@endsection
