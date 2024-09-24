<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="GFs-znWZKU1bYhAY3giGm5_94hzwKAQtA6T83wVN0uk" />

    @yield('head')

    <!-- bootstrap connection -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.3.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="../../../css/custom.css">
</head>

<body>

    <!-- top item -->
    <div class="container">
        <!-- brand logo -->
        <span class="d-flex justify-content-center">
            <div class="row">
                <div class="d-flex align-items-center">
                    <div class="col-sm-4 col-md-4 mt-4">
                        <a href="/">
                            <img src="../../../assets/icon/Icon Funiture.jpeg" alt="Furniture" class="rounded-circle" width="150vw;">
                        </a>
                    </div>
                </div>
            </div>
        </span>

        <!-- navigasi menu -->
        <div class="d-flex justify-content-center">
            <div class="row my-3">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="d-flex justify-content-center">Menu</span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="../../../../about" role="button">
                                    Tentang Kami
                                </a>
                            </li>
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="../../../../artikel" role="button">
                                    Artikel
                                </a>
                            </li>
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="../../../../../kategori/produk/rumah-dijual">
                                    Rumah DIjual
                                </a>
                            </li>
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="../../../../../kategori/produk/rumah-disewakan">
                                    Rumah Disewakan
                                </a>
                            </li>
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="../../../../../kategori/produk/tanah-dijual">
                                    Tanah Dijual
                                </a>
                            </li>
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="../../../../../kategori/produk/tanah-disewakan">
                                    Tanah Disewakan
                                </a>
                            </li>

                            @guest
                            <li class="nav-item dropdown active">
                                <a class="nav-link d-none d-lg-block" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <!--                                    <img src="../../../assets/icon/account_cog_icon_137995.svg" width="20vw" alt="">-->
                                    Akun
                                </a>
                                <a class="nav-link d-lg-none d-md-block" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Akun
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="../../../login">Masuk</a>
                                    <a class="dropdown-item" href="../../../register">Daftar</a>
                                </div>
                            </li>
                            @else

                            <li class="nav-item dropdown active">
                                <a class="nav-link d-none d-lg-block" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <!--                                    <img src="../../../assets/icon/account_cog_icon_137995.svg" width="20vw" alt="">-->
                                    Akun
                                </a>
                                <a class="nav-link d-lg-none d-md-block" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Akun
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <!--                                    <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>-->
                                    <a class="dropdown-item" href="../../../account">Akun</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                            @endguest

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    @yield('content')

    <footer class="container my-2">
        <div class="row">
            <div class="col my-1">
                <h5 class="card-title nav-link mb-2" style="color: #6E6E6E;font-weight: 700;size: 1rem;">Short Link</h5>
                <a class="nav-link my-n1" href="../../../../../about" style="color: #6E6E6E;font-weight: 600;size: 1rem;">Tentang</a>
                <a class="nav-link my-n3" href="../../../../../kategori/produk/rumah-dijual" style="color: #6E6E6E;font-weight: 600;size: 1rem;">Rumah Dijual</a>
                <a class="nav-link my-n3" href="../../../../../kategori/produk/rumah-disewakan" style="color: #6E6E6E;font-weight: 600;size: 1rem;">Rumah Disewakan</a>
                <a class="nav-link my-n3" href="../../../../../kategori/produk/tanah-dijual" style="color: #6E6E6E;font-weight: 600;size: 1rem;">Tanah Dijual</a>
                <a class="nav-link my-n3" href="../../../../../kategori/produk/tanah-disewakan" style="color: #6E6E6E;font-weight: 600;size: 1rem;">Tanah Disewakan</a>
            </div>
            <div class="col my-1">
                <h5 class="card-title nav-link mb-2" style="color: #6E6E6E;font-weight: 700;size: 1rem;">Hubungi Kami</h5>
                <a class="nav-link my-n3" href="#" style="color: #6E6E6E;font-weight: 600;size: 1rem;">
                    <img src="../../../../../assets/icon/fb_icon-icons.com_65434.svg" alt="" width="20vw;" style="fill: #6E6E6E;">
                    bambangharyomanggolo
                </a>
                <a class="nav-link my-n3" href="#" style="color: #6E6E6E;font-weight: 600;size: 1rem;">
                    <img src="../../../../../assets/icon/instagram_icon-icons.com_65435.svg" alt="" width="20vw;" style="fill: #6E6E6E;">
                    @bambangharyomanggolo
                </a>
                <a class="nav-link my-n3" href="#" style="color: #6E6E6E;font-weight: 600;size: 1rem;">
                    <img src="../../../../../assets/icon/whatsapp-logo_icon-icons.com_57054.svg" alt="" width="20vw;" style="fill: #6E6E6E;">
                    0821-3869-3867
                </a>
                <a class="nav-link my-n3" href="#" style="color: #6E6E6E;font-weight: 600;size: 1rem;">
                    <i class="fas fa-phone-square-alt fa-lg"></i>
                    0821-3869-3867
                </a>
            </div>
            <div class="col my-1">
                <h5 class="card-title nav-link mb-2" style="color: #6E6E6E;font-weight: 700;size: 1rem;">Area Penjualan</h5>
                <div class="nav-link my-n3" style="color: #6E6E6E;font-weight: 600; size: 1rem;">
                    <img src="../../../../../assets/icon/ecommerce_home_market_mart_shop_shopping_store_icon_123207.svg" alt="" width="20vw;" style="fill: #6E6E6E;">
                    <a href="../../../lokasi/sleman">Sleman</a>
                </div>
                <div class="nav-link my-n3" style="color: #6E6E6E;font-weight: 600; size: 1rem;">
                    <img src="../../../../../assets/icon/ecommerce_home_market_mart_shop_shopping_store_icon_123207.svg" alt="" width="20vw;" style="fill: #6E6E6E;">
                    <a href="../../../lokasi/kota-yogyakarta">Kota Yogyakarta</a>
                </div>
                <div class="nav-link my-n3" style="color: #6E6E6E;font-weight: 600; size: 1rem;">
                    <img src="../../../../../assets/icon/ecommerce_home_market_mart_shop_shopping_store_icon_123207.svg" alt="" width="20vw;" style="fill: #6E6E6E;">
                    <a href="../../../lokasi/bantul">Bantul</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @yield('js')

</body>

</html>
