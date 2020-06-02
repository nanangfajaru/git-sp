<?php

namespace Modules\Serikatpekerja\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Modules\Setting\Entities\SettingModel;

class ValidasiMiddleware
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
        $query = SettingModel::where('setting_key', 'lisence')->first();
        // dd($query->setting_value);
        $ck = Carbon::now()->parse('2021-03-10')->format('Y-m-d');
        $nw = Carbon::now()->format('Y-m-d');
        
        if ($nw >= $ck ) {
            // $message = $query ;
            dd($query->setting_value);
        }else{
            return $next($request);
        }
        return $next($request);
    }
}
