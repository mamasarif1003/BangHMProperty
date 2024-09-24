<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\ArtCategory;
use Carbon\Carbon;
use App\Article;
use Auth;
use File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $article = Article::orderBy('id', 'DESC')->get();
        return view('admin.article.index',compact('article'));
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
        return view('admin.article.form',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'thumbnail' => 'required|file|image|mimes:jpeg,png,webp,jpg|max:2048',
			'title' => 'required|unique:articles',
			'article' => 'required',
		],
        [
            'title.unique' => 'Nama Artikel sudah ada',
            'article.required' => 'Isi Artikel tidak boleh kosong',
        ]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('thumbnail');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'storage/thumbnail/article';
		$file->move($tujuan_upload,$nama_file);
 
		Article::create([
            'title' => $request->title,
            'category' => $request->category,
            'keywords' => $request->keywords,
            'thumbnail' => $nama_file,
            'article' => $request->article,
            'writer' => Auth::user()->name,
            'slug' => Str::slug($request->title)
		]);
        
//        dd($cek);
		return redirect('/article')->with('status', 'Artikel Berhasil Ditambahkan!');;
	}
    
    //upload gambar (artikel)
    public function upload(Request $request)
    {

        if ($request->hasFile('upload')) {
            $file = $request->file('upload'); 
            $fileName = time()."_".$file->getClientOriginalName();

            $tujuan_upload = 'storage/uploads/article';
            $file->move($tujuan_upload, $fileName);

            $ckeditor = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/article/' . $fileName);
            $msg = 'Image uploaded successfully';
            
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($ckeditor, '$url', '$msg')</script>";

            //SET HEADERNYA
            @header('Content-type: text/html; charset=utf-8'); 
            return $response;
        }
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
        $article = Article::where('id',$id)->get();
        
        return view('admin.article.show',compact('article'));
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
        $article = Article::where('id',$id)->get();
        $category = ArtCategory::all();
        
        return view('admin.article.edit',compact('article','category'));
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
        $article = Article::where('id',$id)->first();
        $cekFoto = $request->thumbnail;
        
        if(empty($cekFoto)) {
            $nama_file = $article->thumbnail;
        } else {
            //hapus gambar lama
            File::delete('storage/thumbnail/article/'.$article->thumbnail);
            
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file( 'thumbnail' );

            $nama_file = time().'_'.$file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/thumbnail/article';
            $file->move( $tujuan_upload, $nama_file );
        }
        
        $article->thumbnail = $nama_file;
        $article->title = $request->title;
        $article->keywords = $request->keywords;
        $article->category = $request->category;
        $article->article = $request->article;
        $article->save();

        return redirect('article')->with( 'status', 'Artikel Berhasil Diperbarui!' );
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
        $article = Article::where('id',$id)->first();
        File::delete('storage/thumbnail/article/'.$article->thumbnail);
    	$article_del = Article::where('id',$id);
    	$article_del->delete();
        
        return redirect()->back()->with('status', 'Artikel Berhasil Dihapus!');
    }
}
