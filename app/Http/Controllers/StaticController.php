<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function about()
    {
        return view('static.about');
    }
    public function payment()
    {
        return view('account.payment');
    }
}
