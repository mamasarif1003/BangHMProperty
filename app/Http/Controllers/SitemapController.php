<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArtCategory;
use App\Category;
use App\Article;
use App\Product;
use App\Place;

class SitemapController extends Controller {
    public function index() {
        $artikel = Article::all()->first();
        $artkategori = ArtCategory::all()->first();
        $produk = Product::all()->first();
        $prokategori = Category::all()->first();
        $lokasi = Place::all()->first();
        return response()->view( 'sitemap.index', [
            'artikel' => $artikel,
            'artkategori' => $artkategori,
            'produk' => $produk,
            'prokategori' => $prokategori,
            'lokasi' => $lokasi,
        ] )->header( 'Content-Type', 'text/xml' );
    }

    public function artikel() {
        $artikel = Article::latest()->get();
        return response()->view( 'sitemap.artikel', [
            'artikel' => $artikel,
        ] )->header( 'Content-Type', 'text/xml' );
    }

    public function produk() {
        $produk = Product::latest()->get();
        return response()->view( 'sitemap.produk', [
            'produk' => $produk,
        ] )->header( 'Content-Type', 'text/xml' );
    }

    public function katartikel() {
        $katartikel = ArtCategory::latest()->get();
        return response()->view( 'sitemap.katartikel', [
            'katartikel' => $katartikel,
        ] )->header( 'Content-Type', 'text/xml' );
    }

    public function katproduk() {
        $katproduk = Category::all();
        return response()->view( 'sitemap.katproduk', [
            'katproduk' => $katproduk,
        ] )->header( 'Content-Type', 'text/xml' );
    }

    public function lokasi() {
        $lokasi = Place::all();
        return response()->view( 'sitemap.lokasi', [
            'lokasi' => $lokasi,
        ] )->header( 'Content-Type', 'text/xml' );
    }
}
