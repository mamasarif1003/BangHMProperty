@extends('layouts.admin')

@section('content')

<head>
    <meta charset="UTF-8">
    <title>Edit Lokasi</title>
    <style>
        .card {
            width: 100%;
        }

        form {
            display: contents;
        }

    </style>
</head>

<body>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Lokasi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../../../place/create">Lokasi</a></li>
            <li class="breadcrumb-item active">Edit Lokasi</li>
        </ol>

        <!--CARD-->
        <div class="col-md-12">

            @if(session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
            </div>
            @endif

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Lokasi
                </div>
                <div class="card-body">
                    @foreach ($place as $c)
                    <form action="{{route('place.update', $c->id)}}" method="post">
                        @csrf

                        <input type="hidden" value="PUT" name="_method">
                        <div class="form-group">
                            <label for="">Nama Lokasi</label>
                            <input type="text" class="form-control" name="place" placeholder="Lokasi" value="{{ $c->name }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</body>
@endsection
