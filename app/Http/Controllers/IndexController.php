<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\ArtCategory;
use App\Category;
use App\Article;
use App\Product;
use App\Place;

class IndexController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('id', 'DESC')->paginate(4);
        $article = Article::orderBy('id', 'DESC')->paginate(4);
//        $productc = Product::first();
//        $pict = Str::of($productc->pict)->explode(',');
//        dd($article);
        return view('index',compact('product','article'));
    }
    
    public function katproduk($slug)
    {
        //
        $category = Category::where('slug',$slug)->first();
        $productt = Product::where('category',$category->category)->first();
        $product = Product::where('category',$category->category)->orderBy('id', 'DESC')->paginate(8);
        
        if(empty($productt)) {
            return view('category.kosong',compact('product'));
        }
        
        return view('category.product',compact('product','productt'));
    }
    
    public function katartikel($slug)
    {
        //
        $category = ArtCategory::where('slug',$slug)->first();
        $article = Article::where('category',$category->category)->orderBy('id', 'DESC')->paginate(8);
        
        return view('category.article',compact('article'));
    }
    
    public function produk()
    {
        //
        $produk = Product::orderBy('id', 'DESC')->paginate(8);
        
        return view('category.index-produk',compact('produk'));
    }
    
    public function artikel()
    {
        //
        $artikel = Article::orderBy('id', 'DESC')->paginate(8);
        
        return view('category.index-artikel',compact('artikel'));
    }
    
    //berdasarkan tempat
    public function place($slug)
    {
        //
        $placef = Place::where('slug', $slug)->first();
        $place = Place::where('slug', $slug)->get();
        $product = Product::where('place',$placef->name)->orderBy('id', 'DESC')->paginate(8);
        
        return view('category.place',compact('place','product'));
    }
}
