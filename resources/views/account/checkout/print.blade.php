<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Cetak Pembayaran
    </title>

    <!-- bootstrap connection -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.3.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />
    <style>
        form {
            display: contents;
        }

        h6 {
            font-weight: bold;
        }

    </style>
</head>

<body>
    <div class="imagebg2">
        <div class="container p-5 m5">
            <div class="row">
                <div class="col-md-12">
                    <div class="transparen card shopping-cart">
                        <div class="card-body">

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
                                                <select class="form-control" name="rekening" disabled>
                                                    @foreach ($bank as $b)
                                                    <option value="{{ $order->rekening }}" @if($order->rekening == $b->slug)
                                                        selected
                                                        @endif>{{ $b->name }}</option>
                                                    @endforeach
                                                </select>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="row">DP</th>
                                            <th scope="row">:</th>
                                            <th scope="row">
                                                <select class="form-control" name="dp" disabled>
                                                    @foreach ($dp as $b)
                                                    <option value="{{ $order->dp }}" @if($order->dp == $b->name)
                                                        selected
                                                        @endif>Rp. {{ number_format($b->name) }}</option>
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
                                        <tr>
                                            <td><img src="../storage/thumbnail/{{ $order->gambar }}" alt="{{ $order->gambar }}" width="100"></td>
                                            <td>{{ $order->nama_produk }}</td>
                                            <td>Rp. {{number_format($order->harga)}}</td>
                                            <td>{{ $order->lokasi }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
