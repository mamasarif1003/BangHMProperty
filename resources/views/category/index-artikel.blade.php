@extends('layouts.main')

@section('content')
@section('head')
<title>Artikel - BangHM</title>
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
        <h6 class="h2">Artikel</h6>
    </div>
</div>

<div class="container">
    <!-- content pertama -->
    <div class="row">

        @foreach($artikel as $a)
        <div class="col-md-3">
            <a class="nav-link" href="">
                <div class="contentcrd">
                    <a class="name-link" href="/artikel/{{ $a->slug }}">
                        <img class="card-img-top" width="500" src="../../storage/thumbnail/article/{{$a->thumbnail}}" alt="{{ $a->title }}">
                    </a>
                    <div class="">
                        <h6 class="card-title mt-3"><a class="name-link" href="/artikel/{{ $a->slug }}">{{{ $a->title }}}</a></h6>
                        <p class="my-1 card-text a">{{ $a->category }}
                        </p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <div class="mt-5 d-flex justify-content-center">
        {{ $artikel->links() }}
    </div>

</div>


@endsection
