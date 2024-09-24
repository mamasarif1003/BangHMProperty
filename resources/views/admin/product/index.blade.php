@extends('layouts.admin')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <style>
        form {
            display: contents;
        }
        
        img{
            width: 500;
            height: auto;
        }

    </style>
</head>

<body>
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Daftar Produk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../../../admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Produk</li>
            </ol>

            @if(session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
            </div>
            @endif

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Data Produk
                </div>
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Thumbnail</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Thumbnail</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Opsi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach ($product as $p)
                                <tr>
                                    <td><b>{{ $no++ }}</b></td>
                                    <td>
                                    <img src="/storage/thumbnail/product/{{ $p->pict }}" alt="Thumbnail" width="120">
                                    </td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->category }}</td>
                                    <td>Rp. {{ number_format($p->price) }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('product.show', [$p->id]) }}" title="Detail">
                                            <i class="fas fa-info"></i>
                                        </a>
                                        <a class="btn btn-success" href="{{ route('product.edit', [$p->id]) }}" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{route('product.destroy', [$p->id])}}" method="POST">
                                            @csrf
                                            <button class="btn btn-danger" type="submit" title="Hapus"><i class="fas fa-trash-alt"></i></button>
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
    </main>
</body>

</html>
@endsection
