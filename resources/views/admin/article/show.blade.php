@extends('layouts.admin')

@section('content')

<head>
    <title>Detail Artikel</title>
    <style>
        form {
            display: contents;
        }

    </style>
</head>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Detail Artikel</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../../../admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="../../../article">Artikel</a></li>
            <li class="breadcrumb-item active">Detail Artikel</li>
        </ol>

        @if(session()->has('status'))
        <div class="alert alert-success">
            {{ session()->get('status') }}
        </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-info mr-1"></i>
                Detail Artikel
            </div>

            @foreach($article as $a)
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <center>
                            <img src="/storage/thumbnail/article/{{ $a->thumbnail }}" width="500px" class="img-fluid img-center">
                        </center>
                    </div>
                    <div class="container">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Detail</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <p><?php echo $a->article; ?></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>

@endsection
