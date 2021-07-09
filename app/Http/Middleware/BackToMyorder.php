<?php

namespace App\Http\Middleware;

use Closure,Auth;
use Illuminate\Http\Request;

class BackToMyorder
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
        $User=Auth::user();
        $orders = $User->orders;
        if ($orders->count() != 0) {
            $count=$orders->count();
            $status = $orders[$count-1]->status;
            if ($status == 1 || $status == 2) {
                return redirect("borrow/myorder/all")->with('message', '還有未歸還或尚未領取的東西!');
            }
        }
        return $next($request);
    }
}
