<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Place;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $place = Place::orderBy('id', 'DESC')->get();
        return view('admin.place.form',compact('place'));
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
//        $dataValid = $request->validate([
//            'name' => 'required|max:255',
//        ],
//        [
//            'name.required' => 'Nama Lokasi harus di isi',
//        ]);
        
        $place = new Place;
        $place->name = $request->place;
        $place->slug = Str::slug($request->place);
        $place->save();
        
        return redirect()->back()->with('status', 'Lokasi Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $place = place::where('id',$id)->get();
        
        return view('admin.place.edit',compact('place'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $place = Place::where('id',$id)->first();
        $place->name = $request->place;
        $place->slug = Str::slug($request->place);
        $place->save();

        return redirect('place/create')->with('status', 'Lokasi Berhasil Diperbarui!');
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
        Place::where('id',$id)->delete();
        
        return redirect()->back()->with('status', 'Lokasi Berhasil Dihapus!');
    }
}
