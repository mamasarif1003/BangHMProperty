<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\Product;
use App\Place;
use File;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = Product::orderBy('id', 'DESC')->get();
        
        return view('admin.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::get();
        $place = Place::get();
        return view('admin.product.form',compact('category','place'));
    }
    
    //TAMBAH POST DESKRIPSI
    public function upload(Request $request)
    {

        if ($request->hasFile('upload')) {
            $file = $request->file('upload'); 
            $fileName = time()."_".$file->getClientOriginalName();

            $tujuan_upload = 'storage/uploads/product/';
            $file->move($tujuan_upload, $fileName);

            $ckeditor = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/product/' . $fileName);
            $msg = 'Image uploaded successfully';
            
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($ckeditor, '$url', '$msg')</script>";

            //SET HEADERNYA
            @header('Content-type: text/html; charset=utf-8'); 
            return $response;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        
        $dataValid = $request->validate([
            'pict' => 'required|file|image|mimes:jpeg,png,webp,jpg|max:10000',
            'name' => 'required|unique:products',
            'l_tanah' => 'required',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
        ],
        [
            'pict.required' => 'Gambar harus di isi',
            'name.required' => 'Nama Produk harus di isi',
            'name.unique' => 'Nama Produk sudah ada',
            'l_tanah.required' => 'Luas tanah harus di isi',
            'category.required' => 'Kategori Produk harus di isi',
            'price.required' => 'Harga Produk harus di isi',
            'description.required' => 'Deskripsi Produk harus di isi',
        ]);
        
		$file = $request->file('pict');
		$nama_file = time()."_".$file->getClientOriginalName();
 
		$tujuan_upload = 'storage/thumbnail/product';
		$file->move($tujuan_upload,$nama_file);
 
		$product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'keywords' => $request->keywords,
            'writer' => Auth::user()->name,
			'pict' => $nama_file,
            'l_tanah' => $request->l_tanah,
            'l_bangunan' => $request->l_bangunan,
            'k_tidur' => $request->k_tidur,
            'k_mandi' => $request->k_mandi,
            'j_lantai' => $request->j_lantai,
            'category' => $request->category,
            'price' => $request->price,
            'place' => $request->place,
            'description' => $request->description,
		]);
        
        return redirect('product')->with('status', 'Produk Berhasil Ditambahkan!');
//        dd($product);
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
        $product = Product::where('id',$id)->get();
        
        return view('admin.product.show',compact('product'));
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
        $product = Product::where('id',$id)->get();
        $category = Category::get();
        $place = Place::get();
        
        return view('admin.product.edit',compact('product','category','place'));
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
        //validasi
        $product = Product::where('id',$id)->first();
        
        if($request->name == $product->name) {
            $rule_name = 'required';
        } else {
            $rule_name = 'required|unique:products';
        }
        
        $dataValid = $request->validate([
//            'pict' => 'required|file|image|mimes:jpeg,png,jpg|max:10000',
            'name' => $rule_name,
            'l_tanah' => 'required',
            'category' => 'required',
            'price' => 'required',
            'place' => 'required',
            'description' => 'required',
        ],
        [
            'name.required' => 'Nama Produk harus di isi',
            'name.unique' => 'Nama Produk sudah ada',
            'l_tanah.required' => 'Luas tanah harus di isi',
            'category.required' => 'Kategori Produk harus di isi',
            'price.required' => 'Harga Produk harus di isi',
            'place.required' => 'Lokasi harus di isi',
            'description.required' => 'Deskripsi Produk harus di isi',
        ]);
        
        $product->name = $request->name;
        $product->keywords = $request->keywords;
        $product->l_tanah = $request->l_tanah;
        $product->l_bangunan = $request->l_bangunan;
        $product->k_tidur = $request->k_tidur;
        $product->k_mandi = $request->k_mandi;
        $product->j_lantai = $request->j_lantai;
        $product->slug = Str::slug($request->name);
        $product->category = $request->category;
        $product->price = $request->price;
        $product->place = $request->place;
        $product->description = $request->description;
        $product->save();
        
        return redirect('product')->with('status', 'Produk Berhasil Diperbarui!');
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
        $produk = Product::where('id',$id)->first();
        File::delete('storage/thumbnail/product/'.$produk->pict);
    	$produk_del = Product::where('id',$id);
    	$produk_del->delete();
        
        return redirect()->back()->with('status', 'Produk Berhasil Dihapus!');
    }
}
