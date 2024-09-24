<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use App\Product;
use Auth;

class WishlistController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $wishlistu = Wishlist::where('user_id', Auth::user()->id)->first();
        if(empty($wishlistu)){
            return view('account.wishlist-kosong');
        }
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();
        $product = Product::where('id', $wishlistu->product_id)->with(['wishlist'])->get();
//            Product::where('id', $wishlistu->barang_id)->get();
        
        
        return view('account.wishlist', compact('wishlist','product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$slug)
    {
        //
        $produk = Product::where('slug',$slug)->first();
        $cek_wishlist = Wishlist::where('user_id', Auth::user()->id)
            ->where('product_id', $produk->id)->first();
        
        if(empty($cek_wishlist))
        {
            $wishlist = new Wishlist;
            $wishlist->user_id = Auth::user()->id;
            $wishlist->product_id = $produk->id;
            $wishlist->photo = $produk->pict;
            $wishlist->name = $produk->name;
            $wishlist->price = $produk->price;
            $wishlist->save();
        }
        
//        dd($wishlist);
        return redirect('wishlist')->with('status','Produk Berhasil Ditambahkan ke Favorit!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $wishlist = Wishlist::where('user_id', Auth::user()->id)
            ->where('id', $id)
            ->delete();
        
        return redirect()->back()->with('status', 'Berhasil Dihapus dari Favorit!');;
    }
}
