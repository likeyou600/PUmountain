<?php

namespace App\Http\Middleware;

use Closure, Cart, Auth;
use Illuminate\Http\Request;

class BackToCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Cart::session(Auth::user()->id)->isEmpty()) {
            return redirect('borrow/cart')->with('message', '借物車尚無物品~');
        }
        return $next($request);
    }
}
