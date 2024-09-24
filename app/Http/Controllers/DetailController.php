<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\ArtCategory;
use App\Category;
use App\Article;
use App\Product;
use App\Place;

class DetailController extends Controller
{
    public function produk($slug)
    {
        $latestp = Product::orderBy('id', 'DESC')->limit(4)->get();
        $product = Product::where('slug',$slug)->get();
        $place = Place::all();
        $category = Category::all();
        
        return view('detail.produk',compact('place','latestp','product','category'));
    }
    
    public function artikel($slug)
    {
        $latestp = Article::orderBy('id', 'DESC')->limit(4)->get();
        $article = Article::where('slug',$slug)->get();
        $artcategory = ArtCategory::all();
        
        return view('detail.artikel',compact('latestp','article','artcategory'));
    }
}
