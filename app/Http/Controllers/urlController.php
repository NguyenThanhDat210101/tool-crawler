<?php

namespace App\Http\Controllers;

use App\Models\url;
use Illuminate\Http\Request;

class urlController extends Controller
{
    public function index()
    {
        return view('url-admin');
    }

    public function post(Request $request){
        url::create([
            'url'=>$request->input('url')
        ]);

        return redirect()->route('card-add');
    }
}
