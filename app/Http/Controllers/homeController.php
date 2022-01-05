<?php

namespace App\Http\Controllers;

use App\Models\stats;
use App\Models\url;
use Illuminate\Http\Request;
use Weidner\Goutte\GoutteFacade;

class homeController extends Controller
{
    protected $url_data;
    public function index()
    {
        return view('form')->with('url',url::all());
    }

    public function post(Request $request)
    {
        //request
        $url = explode('??', $request->input('url_web'));
        $card = $request->input('card_web');
        $link = explode('/',$url[0]);
        $this->url_data = $link[0].'//'.$link[2];
        //crawler dữ liệu từ url
        $crawler = GoutteFacade::request('GET', $url[0]);

        $data_link = $crawler->filter($card)->each(function ($node) {
            return $this->url_data.$node->attr('href');
        });
        $data_name = $crawler->filter($card)->each(function ($node) {
            return $node->text();
        });
        //
        $array = array();
        for($i=0;$i<count($data_name);$i++)
        {
            $array[$i] = $data_name[$i];
        }
        stats::whereNotIn('data_name',$array)->where('url_id',$url[1])->delete();
        //    updateorcreate work
        for($i=0;$i<count($data_name);$i++){
            $stat[$i] = stats::updateOrCreate(
                ['data_name'=>$data_name[$i]],
                [
                    'data_link'=>$data_link[$i],
                    'url_id'=>$url[1]
                ]
            );
        }
        return view('form')->with('url', url::all())
                                ->with('stats',$stat);

    }
}
