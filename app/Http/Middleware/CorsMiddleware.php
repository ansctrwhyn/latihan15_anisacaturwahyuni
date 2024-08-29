<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
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
        // rule header harus di set secacra spesifik
        $headers = [
            'Access-Control-Allow-Origin' => '*',
            // 'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Methods' => 'GET',
            'Access-Control-Allow-Credentials' => 'true',
            'Access-Control-Max-Age' => '86400',
            'Access-Control-Allow-Headers' => 'Content-Type, Authorization, X-Requested-With'
        ];

        // jika method yg masuk adalah OPTIONS
        if ($request->isMethod('OPTIONS')) {
            // kembalikan method OPTIONS
            return response()->json('{"method": "OPTIONS"}', 200, $headers);
        }

        // meneruskan response dengan menyertakan headers
        $response = $next($request);
        foreach ($headers as $key => $row) {
            $response->header($key, $row);
        }
        return $response;
    }
}
