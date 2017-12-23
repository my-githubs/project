<?php

namespace App\Http\Middleware;

use Closure;

class SigninMiddleware
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
        $id = session('uid');
        //没有登陆
        if(empty($id)) {
            return redirect('/admin/signin')->with('msg','没有登陆');
        }
        return $next($request);
    }
}
