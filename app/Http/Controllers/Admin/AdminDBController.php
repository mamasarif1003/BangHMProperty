<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Article;

class AdminDBController extends Controller
{
    public function index()
    {
        $produk = Product::count();
        $artikel = Article::count();
        return view('admin.dashboard',compact('produk','artikel'));
    }
}
