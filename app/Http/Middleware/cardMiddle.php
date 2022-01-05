<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class cardMiddle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $url = explode('??', $request->input('url_web'));
        $card = $request->input('card_web');
        if(!empty($url[0]) && !empty($card)){
            return $next($request);
        }
        else{
            return redirect()->route('card-add');
        }
    }
}
