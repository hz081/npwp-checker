<?php

namespace App\Http\Middleware;

use Closure;

class TokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //init curl to get token
        $url        = 'https://djponline.pajak.go.id/account/login';

        $ch         = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $html       = curl_exec($ch);

        //extract html to get the data
        $dom        = new \DOMDocument();
        $dom->loadHTML($html);

        $scripts    = $dom->getElementsByTagName('script');

        //get token for future request
        $script     = $scripts[0];
        $nodeValue  = $script->nodeValue;
        preg_match('/\window\.([a-zA-Z0-9]{2})\s*=(.*?);/', $nodeValue, $matches);
        preg_match('/"([^"]+)"/', $matches[0], $token);
        $token      = $token[1];
        $request->merge(compact('token'));

        return $next($request);
    }
}
