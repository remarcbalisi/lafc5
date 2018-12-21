<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class CheckUserStatus
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
        /**
         * active - 1
         * inactive - 2
         * suspended - 3
         */

        $user = User::where(['id'=>Auth::user()->id])->first()->user_status()->where(['id'=>1])->first();
        if( $user && $user->status_id == 1 ){
            return $next($request);
        }

        Auth::logout();
        return redirect('login')->withErrors([
            'not_activated' => 'Your account is not activated yet.'
        ]);
        
    }
}
