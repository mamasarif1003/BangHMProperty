<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\ArtCategory;
use App\Article;

class ArtCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = ArtCategory::orderBy('id', 'DESC')->get();
        return view('admin.art-category.form',compact('category'));
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
            'category' => 'required|unique:art_categories|max:255',
        ],
        [
            'category.required' => 'Nama Kategori harus di isi',
            'category.unique' => 'Nama Kategori sudah ada',
        ]);

        $category = new ArtCategory;
        $category->category = $request->category;
        $category->slug = Str::slug($request->category);
        $category->save();
        
        return redirect()->back()->with('status', 'Kategori Berhasil Ditambahkan!');
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
        $category = ArtCategory::where('id',$id)->get();
        
        return view('admin.art-category.edit',compact('category'));
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
        $category = ArtCategory::where('id',$id)->first();
        $category->category = $request->category;
        $category->slug = Str::slug($request->category);
        $category->save();

        return redirect('art-category/create')->with('status', 'Kategori Berhasil Diperbarui!');
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
        ArtCategory::where('id',$id)->delete();
        
        return redirect()->back()->with('status', 'Kategori Berhasil Dihapus!');
    }
}
