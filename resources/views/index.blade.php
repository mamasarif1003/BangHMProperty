@extends('layouts.main')

@section('content')

@section('head')
<title>BangHM</title>
<meta name="description" content="BangHM adalah web jual Beli Rumah, Properti, Tanah di Yogyakarta dan sekitarnya.">

<style>
    .name-link {
        color: black;
    }

    .name-link:hover {
        color: black;
    }

    h6 {
        font-weight: 600;
    }

    .name-link img {
        width: 100%;
        height: 13vw;
        object-fit: cover;
    }

    .btn-outline-darkkhaki:hover {
        color: #fff;
        background-color: darkkhaki;
        border-color: darkkhaki
    }

    .btn-outline-darkkhaki.focus,
    .btn-outline-darkkhaki:focus {
        box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5)
    }

    .btn-outline-darkkhaki.disabled,
    .btn-outline-darkkhaki:disabled {
        color: darkkhaki;
        background-color: transparent
    }

    .btn-outline-darkkhaki:not(:disabled):not(.disabled).active,
    .btn-outline-darkkhaki:not(:disabled):not(.disabled):active,
    .show>.btn-outline-darkkhaki.dropdown-toggle {
        color: #fff;
        background-color: darkkhaki;
        border-color: darkkhaki
    }

    .btn-outline-darkkhaki:not(:disabled):not(.disabled).active:focus,
    .btn-outline-darkkhaki:not(:disabled):not(.disabled):active:focus,
    .show>.btn-outline-darkkhaki.dropdown-toggle:focus {
        box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5)
    }

    @media only screen and (max-width: 767px) {
        .name-link img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    }

</style>
@endsection

<style>
    .btn-outline-darkkhaki {
        color: gray;
        background-color: transparent;
        background-image: none;
        border-color: darkkhaki
    }

</style>

<!-- judul content pertama -->
<div class="container mt-n3 fcontent">
    <div class="d-flex justify-content-center">
        <h6 class="h2">Produk Terbaru</h6>
    </div>
</div>

<div class="container">
    <!-- content pertama -->
    <div class="row">
        @foreach($product as $p)
        <div class="col-md-3">
            <div>
                <div class="contentcrd">
                    <a class="name-link" href="/produk/{{ $p->slug }}">
                        <img class="card-img-top" src="{{ url('../../storage/thumbnail/product/'.$p->pict) }}" alt="{{ $p->name }}">
                    </a>
                    <div class="">
                        <h6 class="card-title mt-3"><a class="name-link" href="/produk/{{ $p->slug }}">{{{ $p->name }}}</a></h6>
                        <p class="my-1 card-text a">{{ $p->category }}
                        </p>
                        <p class="card-text b">Rp {{ number_format($p->price) }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4 d-flex justify-content-center">
        <a href="/produk" type="button" class="btn btn-outline-darkkhaki">Lihat Semua</a>
    </div>

</div>

<!-- judul content pertama -->
<div class="container mt-5 fcontent">
    <div class="d-flex justify-content-center">
        <h6 class="h2">Artikel Terbaru</h6>
    </div>
</div>

<div class="container">
    <!-- content pertama -->
    <div class="row">
        @foreach($article as $a)
        <div class="col-md-3">
            <div>
                <div class="contentcrd">
                    <a class="name-link" href="/artikel/{{ $a->slug }}">
                        <img class="card-img-top" src="../../storage/thumbnail/article/{{$a->thumbnail}}" alt="{{ $a->title }}">
                    </a>
                    <div class="">
                        <h6 class="card-title mt-3"><a class="name-link" href="/artikel/{{ $a->slug }}">{{{ $a->title }}}</a></h6>
                        <p class="my-1 card-text a">{{ ucfirst($a->category) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4 d-flex justify-content-center mb-5">
        <a href="/artikel" type="button" class="btn btn-outline-darkkhaki">Lihat Semua</a>
    </div>

</div>
@endsection
