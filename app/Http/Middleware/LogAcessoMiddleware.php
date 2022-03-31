<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\LogAcesso;

class LogAcessoMiddleware
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
        // dd($request);
        $ip =  $request->server->get('REMOTE_ADDR');
        $route = $request->getRequestUri();

        LogAcesso::create(['log' => "IP-> $ip requested route: $route"]);

        // return $next($request);

        $resposta = $next($request);
        return $resposta;
        
    }
}
