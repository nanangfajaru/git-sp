<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Crypt;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AccessMenu
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

        if (Auth::check()) {
       
            $user = $request->user();
            $url = $request->segment(1);

            $first = \DB::table('tr_menu As a')->select('b.menu_url As menu')->leftJoin('mstr_menu As b', 'a.menu_id', '=', 'b.menu_id')->where([['a.role_id', $user->role_id],['b.menu_url', $url ]]);

            $results = $first->pluck('menu')->toArray();

            if ( implode($results) != $url ) {
                $checkMaster = \DB::table('mstr_menu')->where('menu_url', $url)->count();

                $count = $checkMaster ;

                if ($count == 0) {
                    return $next($request);
                }

                return new Response(dd('No Access'));
            }

            return $next($request);
        }

        return redirect('/login');


    } 

}
