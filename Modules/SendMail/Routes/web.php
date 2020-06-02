<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('sendmail')->group(function() {
    Route::get('/', 'SendMailController@sendmail');
});

Route::prefix('mail')->group(function() {
    Route::get('/', 'SendMailController@mail');
    // $details['email'] = 'nanangfajaru@gmail.com';
  
    // dispatch(new Modules\SendMail\Jobs\JobsMail($details));
  
    // dd('done');
});

Route::prefix('kirim')->group(function() {
    Route::get('/',function(){
    	
    	// dispatch(new Modules\SendMail\Jobs\EmailJobs());
    	// Mail::to('nanangfajaru@gmail.com')->send(new Modules\SendMail\Emails\SendMail()) ;

    	$jobs = (new Modules\SendMail\Jobs\EmailJobs())
    			->delay(now()->addSeconds(15)) ;

    		dispatch($jobs);

    	return 'Email Send Ok' ;
    });
});