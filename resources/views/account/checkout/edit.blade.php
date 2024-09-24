@extends('layouts.main')

@section('content')

<head>
    <title>Bantenese Furniture : Pembayaran</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        form {
            display: contents;
        }

        h6 {
            font-weight: bold;
        }

    </style>
</head>

@foreach ($orderg as $o)
<form action="{{route('checkout.update', $o->id)}}" method="post">
   @csrf
   
    @endforeach
    
    <input type="hidden" value="PUT" name="_method">
    <div class="imagebg2">
        <div class="container p-5 m5">
            <nav aria-label="breadcrumb" class="mb-n3">
                <ol class="transparen breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="../../../../account">Akun</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-3">
                    <div class="card shopping-cart">
                        <div class="card-body">
                            <div class="" id="">
                                <div class="list-group list-group-flush">
                                    <a href="../../../../../account" class="d-flex justify-content-center list-group-item list-group-item-action"><small>Dashboard</small></a>
                                    <a href="../../../../../wishlist" class="d-flex justify-content-center list-group-item list-group-item-action"><small>Favorit</small></a>
                                    <a href="../../../../../address/create" class="d-flex justify-content-center list-group-item list-group-item-action"><small>Data Pribadi</small></a>
                                    <a href="../../../../../history" class="d-flex justify-content-center list-group-item list-group-item-action actived"><small>Riwayat Pemesanan</small></a>
                                    <a href="../../../../../payment" class="d-flex justify-content-center list-group-item list-group-item-action"><small>Cara Pembayaran</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="transparen card shopping-cart">
                        <div class="card-body">

                            @if(session()->has('status'))
                            <div class="alert alert-success">
                                {{ session()->get('status') }}
                            </div>
                            @endif

                            @if(session()->has('alert'))
                            <div class="alert alert-warning">
                                {{ session()->get('alert') }}
                            </div>
                            @endif

                            <!-- Data Pesanan -->
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{ Auth::user()->name }} </th>
                                        </tr>
                                        <tr>
                                            <th scope="row">Rekening</th>
                                            <th scope="row">:</th>
                                            <th scope="row">
                                               <select class="form-control" name="rekening">
                                                @foreach ($orderg as $o)
                                                    @foreach ($bank as $b)
                                                    <option value="{{ $b->slug }}" @if($o->rekening == $b->slug)
                                                        selected
                                                        @endif>{{ $b->name }}</option>
                                                    @endforeach
                                                    @endforeach
                                                </select>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="row">DP</th>
                                            <th scope="row">:</th>
                                            <th scope="row">
                                                <select class="form-control" name="dp">
                                                    @foreach ($orderg as $o)
                                                    @foreach ($dp as $b)
                                                    <option value="{{ $b->name }}" @if($o->dp == $b->name)
                                                        selected
                                                        @endif>Rp. {{ number_format($b->name) }}</option>
                                                    @endforeach
                                                    @endforeach
                                                </select>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- PRODUCT -->
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Lokasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderg as $o)
                                        <tr>
                                            <td><img src="../../../storage/thumbnail/{{ $o->gambar }}" alt="{{ $o->gambar }}" width="100"></td>
                                            <td>{{ $o->nama_produk }}</td>
                                            <td>Rp. {{number_format($o->harga)}}</td>
                                            <td>{{ $o->lokasi }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <!-- END PRODUCT -->
                            <button type="submit" class="btn btn-outline-dark">Terapkan</button>

                            <a href="../../checkout" type="button" class="btn btn-outline-dark">Kembali</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
