<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CacheResponse
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
        $response = $next($request);
        
        $response->header('Cache-Control', 'max-age=604800, public');
        $response->header('Expires', gmdate('D, d M Y H:i:s \G\M\T', time() + 604800));

        return $response;
    }
}
