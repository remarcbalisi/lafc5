<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Auth;

class AgentAcc
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

        if( $user && $user->user_roles()->where(['role_id'=>4])->first() ){
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
