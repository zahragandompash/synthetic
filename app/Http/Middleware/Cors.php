<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
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
//        $headers = [
//            'Access-Control-Allow-Origin'      => '*',
//            'Access-Control-Allow-Methods'     => 'POST, GET, OPTIONS, PUT, DELETE',
//            'Access-Control-Allow-Credentials' => 'true',
//            'Access-Control-Max-Age'           => '86400',
//            'Access-Control-Allow-Headers'     => 'Content-Type, Authorization, X-Requested-With'
//        ];
//
//        if ($request->isMethod('OPTIONS'))
//        {
//            return response()->json('{"method":"OPTIONS"}', 200, $headers);
//        }
//
//        $response = $next($request);
//        foreach($headers as $key => $value)
//        {
//            $response->header($key, $value);
//        }
//
//        return $response;

        $response = $next($request);

        $response->headers->set('Access-Control-Allow-Origin' , '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application');
        return $response;
//        return $next($request)
//            ->header('Access-Control-Allow-Origin', '*')
//            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
//            ->header('Access-Control-Allow-Credentials', 'true')
//            ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application');
//            ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-Token-Auth, Authorization');
        }
}
