<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function uploadImg(Request $request){
        dd($request);
    }
}
