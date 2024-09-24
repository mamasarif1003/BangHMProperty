@extends('layouts.main')

@section('content')

@foreach($product as $p)

@section('head')
<title>{{ $p->name }}</title>
<meta name="description" content="<?php echo strip_tags($p->description); ?>">
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
            @foreach($category as $c)
            @if($p->category == $c->category)
            <li class="breadcrumb-item"><a href="../../../kategori/produk/{{ $c->slug }}">{{ $c->category }}</a></li>
            @endif
            @endforeach
            <li class="breadcrumb-item active" aria-current="page">{{ $p->name }}</li>
        </ol>
    </nav>

    <!-- overview produk -->
    <div class="container">
        <div class="row mb-5">
            <center>
                <div class="col-md-10 ml-3">
                    <img src="{{ url('../../storage/thumbnail/product/'.$p->pict) }}" alt="{{ $p->pict }}" class="img-fluid">
                </div>
            </center>
        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deskripsi</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Detail</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                <div class="col-md-10 takedown ml-3" id="article">
                    <h1 class="produkheader h4 mt-3">{{ $p->name }}</h1>
                    <h6 class="h5 mt-n2">Harga : Rp {{ number_format($p->price) }}</h6>

                    @foreach($place as $t)
                    @if($p->place == $t->name)
                    <h6 class="h5 mt-n2">Lokasi : <a href="../../../lokasi/{{ $t->slug }}" style="color: #6E6E6E;text-decoration:none;">{{ $p->place }}</a></h6>
                    @endif
                    @endforeach

                    <p id="desc" class="p text-justify">
                        <?php echo $p->description; ?>
                    </p>
                </div>

            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                <h2 class="mt-4">{{ $p->name }}</h2><br>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama Produk</td>
                                <td><b>:</b></td>
                                <td>{{ $p->name }}</td>
                            </tr>
                            <tr>
                                <td>Luas Bangunan</td>
                                <td><b>:</b></td>
                                <td>{{ number_format($p->l_bangunan) }} m²</td>
                            </tr>
                            <tr>
                                <td>Luas Tanah</td>
                                <td><b>:</b></td>
                                <td>{{ number_format($p->l_tanah) }} m²</td>
                            </tr>
                            <tr>
                                <td>Kamar Tidur</td>
                                <td><b>:</b></td>
                                <td>{{ $p->k_tidur }}</td>
                            </tr>
                            <tr>
                                <td>Kamar Mandi</td>
                                <td><b>:</b></td>
                                <td>{{ $p->k_mandi }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Lantai</td>
                                <td><b>:</b></td>
                                <td>{{ $p->j_lantai }}</td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td><b>:</b></td>
                                <td>{{ $p->category }}</td>
                            </tr>
                            <tr>
                                <td>Lokasi</td>
                                <td><b>:</b></td>
                                <td>{{ $p->place }}</td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><b>:</b></td>
                                <td>Rp. {{ number_format($p->price) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center my-4">
            <a href="../../../wishlist/{{ $p->slug }}" class="btn btn-warning btn" title="Tambahkan ke Favorit">
                Favorit
            </a>
            <a href="http://wa.me/+6282138693867" class="btn btn-success btn mx-3" title="Chat via WhatsApp">
                WhatsApp
            </a>
        </div>

    </div>

    <!-- judul content kedua -->
    <div class="container mt-5 fcontent">
        <div class="d-flex justify-content-center">
            <h6 class="h2">Produk Terbaru</h6>
        </div>
    </div>

    <div class="container">
        <!-- content project -->
        <div class="row">
            @foreach($latestp as $l)
            <div class="col-md-3 my-3">
                <div class="contentcrd">
                    <a class="nav-link" href="../../../produk/{{ $l->slug }}">
                        <img class="card-img-top" src="{{ url('../../storage/thumbnail/product/'.$l->pict) }}" alt="{{ $l->name }}">
                        <div class="mt-2">
                            <h6 class="card-title">{{ $l->name }}</h6>
                            <p class="my-1 card-text a">{{ $l->category }}</p>
                            <p class="card-text b">Rp {{ number_format($l->price) }}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endforeach

@endsection
