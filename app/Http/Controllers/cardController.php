<?php

namespace App\Http\Controllers;

use App\Models\card_url;
use App\Models\stats;
use App\Models\url;
use Illuminate\Http\Request;
use Weidner\Goutte\GoutteFacade;

class cardController extends Controller
{
    public function index()
    {
        return view('card-admin')->with('url', url::all());
    }

    public function post(Request $request)
    {
        $url = explode('??', $request->input('url_web'));
        $card = $request->input('card_web');

        if ($request->get('submit') == "Create") {
            card_url::create([
                'url_id' => $url[1],
                'card' => $card
            ]);
            return redirect()->route('card-add');
        } else {
            //crawler dữ liệu từ url
            $crawler = GoutteFacade::request('GET', $url[0]);
            $data_name = $crawler->filter($card)->each(function ($node) {
                return $node->text();
            });
            return view('card-admin')->with('data', $data_name)->with('url', url::all());
        }
    }
}
