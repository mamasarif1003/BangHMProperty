<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\Product;
use App\Address;
use App\City;
use Auth;

class DashboardController extends Controller
{
    //menampilkan dashboard member
    public function index()
    {
        $address = Address::where('user_id',Auth::user()->id)->with(['province', 'city'])->get();
        $city = City::get();
        
        return view('account.dashboard',compact('address','city'));
    }
}
