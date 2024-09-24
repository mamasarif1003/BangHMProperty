@extends('layouts.main')
@section('content')

@section('head')
<title>BangHM : Home</title>
<meta name="description" content="BangHM adalah web jual Beli Rumah, Properti, Tanah di Yogyakarta dan sekitarnya.">
<style type="text/css">
    body,
    html {
        height: 100%;
        margin: 0;
        color: #777;
    }

    .bgimg-1 {
        position: relative;
        opacity: 0.65;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

    }

    .bgimg-1 {
        background-image: url("../img/homebg.jpg");
        min-height: 70%;
    }

    .caption {
        position: absolute;
        left: 0;
        top: 50%;
        width: 100%;
        text-align: center;
        color: #000;
    }

    .caption span.border {
        background-color: #111;
        color: #fff;
        padding: 18px;
        font-size: 25px;
        letter-spacing: 10px;
    }

    h3 {
        letter-spacing: 5px;
        text-transform: uppercase;
        font: 20px "Lato", sans-serif;
        color: #111;
    }

    .caption span.ggb {
        display: none;
    }

    @media only screen and (max-width: 600px) {
        .caption span.border {
            display: none;
        }

        .caption span.ggb {
            display: block;
            background-color: #111;
            color: #fff;
            padding: 18px;
            font-size: 25px;
            letter-spacing: 10px;
        }
    }

</style>
@endsection

<div style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
    <h3 style="text-align:center;">Selamat Datang {{ Auth::user()->name }}!</h3>

    @if (session('status'))
    <br>
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

</div>

<div class="bgimg-1">
    <div class="caption">
        <span class="border">BangHM</span>
        <span class="border ggb">BangHM</span>
    </div>
</div>


@endsection
