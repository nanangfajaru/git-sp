<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Crypt;
use Session;
use Illuminate\Support\Facades\Auth;
use Modules\Setting\Entities\SettingModel;

class PasswordExpired
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
        $query = SettingModel::where('setting_key', 'exp_cp')->first();
        if(!$query){
            $expireDay = 10 ;
        }else{
            $expireDay = $query->setting_value ;
        }
        
        // dd($expireDay);

        if (Auth::check()) {

            $user = $request->user();
            $password_changed_date = new Carbon(($user->password_changed_date) ? $user->password_changed_date : $user->created_date);
     
            if (Carbon::now()->diffInDays($password_changed_date) >= $expireDay) {
                Session::flash('alert', 'Your Password Expired !!');
                return redirect()->route('ep', Crypt::encrypt($user->user_id));
            }

             return $next($request);
        }
        return redirect('/login');
    }
}
