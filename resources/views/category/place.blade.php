@extends('layouts.main')

@section('content')

@foreach($place as $p)

@section('head')
<title>Rumah dan Tanah di {{ $p->name }} - BangHM</title>
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
@endforeach

<!-- judul content pertama -->
<div class="container mt-n3 fcontent">
    <div class="d-flex justify-content-center">
        <h6 class="h2">{{ $p->name }}</h6>
    </div>
</div>

<div class="container">
    <!-- content pertama -->
    <div class="row">

        @foreach($product as $p)
        <div class="col-md-3">
            <a class="nav-link" href="">
                <div class="contentcrd">
                    <a class="name-link" href="/produk/{{ $p->slug }}">
                        <img class="card-img-top" width="500" src="{{ url('../../storage/thumbnail/product/'.$p->pict) }}" alt="{{ $p->name }}">
                    </a>
                    <div class="">
                        <h6 class="card-title mt-3"><a class="name-link" href="/produk/{{ $p->slug }}">{{{ $p->name }}}</a></h6>
                        <p class="my-1 card-text a">{{ $p->category }}
                        </p>
                        <p class="card-text b">Rp {{ number_format($p->price) }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <div class="mt-5 d-flex justify-content-center">
        {{ $product->links() }}
    </div>
</div>

@endsection
