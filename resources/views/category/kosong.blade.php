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

    @media only screen and (max-width: 767px) {
        .name-link img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    }

</style>
@endsection

<!-- judul content pertama -->
<div class="container mt-n3 fcontent">
    <div class="d-flex justify-content-center">
        <h6 class="h2">Produk Sedang Kosong</h6>
    </div>
</div>

<div class="container">
    <!-- content pertama -->
    <div class="row">
    </div>

    <div class="mt-5 d-flex justify-content-center">
    </div>
</div>

@endsection
