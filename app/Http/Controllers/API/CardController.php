<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\card_url;
use App\Models\Crawler;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function getData($id)
    {
        return card_url::where('url_id',$id)->get();
    }
}
