<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminAuthMIddleware;

class AdminAuthMIddleware
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
        if(!empty(Auth::user())){
            if(url()->current() == route('adminAuth@loginPage') || url()->current() == route('adminAuth@registerPage')){
                return back();
            }
          else{
              if(Auth::user()->role == 'user'){
            return response()->view('wait'); //to the blade saying wait for an admin approval
            }
            return $next($request);
        }

        }
        return $next($request);
    }
}
