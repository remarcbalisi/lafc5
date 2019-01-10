<?php

namespace App\Http\Middleware;

use Closure;

use Auth;
use App\User;

class HrmAcc
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

        if( $user && $user->user_roles()->where(['role_id'=>2])->first() ){
            return $next($request);
        }
        
        /**
         *  abort(404);
         *  return view('errors.forbidden');
         *  return response('Unauthorized.', 401);
         *  return redirect()->back();
         */
        
        abort(403, 'Unauthorized action.');

    }
}
