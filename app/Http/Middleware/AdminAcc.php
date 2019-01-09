<?php

namespace App\Http\Middleware;

use Closure;

use Auth;
use App\User;

class AdminAcc
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
        $user = User::where([
            'id' => Auth::user()->id
        ])->first();

        if( $user && $user->roles()->where(['role_id'=>1])->first() ){
            return $next($request);
        }
        
        abort(403, 'Unauthorized action.');
        
    }
}
