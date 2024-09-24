@extends('layouts.admin')

@section('content')

<head>
    <meta charset="UTF-8">
    <title>Tambah Lokasi</title>
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
        <h1 class="mt-4">Tambah Lokasi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../../../place/create">Lokasi</a></li>
            <li class="breadcrumb-item active">Tambah Lokasi</li>
        </ol>

        <!--CARD-->
        <div class="col-md-12">

            @if(session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }}
                @endforeach
            </div>
            @endif

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Lokasi
                </div>
                <div class="card-body">
                    <form action="{{route('place.store')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="">Nama Lokasi</label>
                            <input type="text" name="place" class="form-control" placeholder="Lokasi" value="{{ old('name') }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>

                    <div class="table-responsive">
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Lokasi</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1 ?>
                                @foreach($place as $c)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $c->name }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('place.edit', [$c->id]) }}">Edit</a>
                                        <form action="{{route('place.destroy', [$c->id])}}" method="POST">
                                            @csrf
                                            <input class="btn btn-danger" type="submit" value="Hapus">
                                            <input type="hidden" name="_method" value="delete">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
@endsection
