<?php

namespace App\Http\Controllers;

use App\Models\stats;
use Illuminate\Http\Request;

class statsController extends Controller
{
    public function index()
    {
        return view('stats')->with('data',stats::all());
    }
    public function search(Request $request)
    {
        $name = $request->input('searchname');
        if(empty($name)){
            return redirect()->route('stats');
        }
        else{
            $stats = stats::where('data_name',"like","%".$name."%")
            ->get();
        }
        return view('stats')
        ->with('data',$stats);
    }
}
