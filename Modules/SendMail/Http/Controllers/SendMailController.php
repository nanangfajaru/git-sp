<?php

namespace Modules\SendMail\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller;

use Mail;
use Carbon;
use Modules\SendMail\Jobs\EmailJobs;

use Modules\SendMail\Entities\SendmailModel;

class SendMailController extends Controller
{   
    public function sendmail() {
      $data = array('name'=>"Adip");
   
      Mail::send(['html'=>'sendmail::mail'], $data, function($message) {
         $message->to('zero_well89@yahoo.com', 'Adip')
         ->subject('Laravel Basic Testing Mail');

         $message->from('sp.kemnaker@gmail.com','No Replay - Aplikasi Serikat Pekerja - Kemnaker');
      });

      echo "Basic Email Sent. Check your inbox.";
   }

   public function mail() {

      $details = SendmailModel::getSP()->first();
      // dd($details->id);
         // $emailJob = new \Modules\SendMail\Jobs\EmailJobs()->delay(Carbon::now()->addSeconds(5));

         // $emailJob = new EmailJobs()->delay(Carbon::now()->addMinutes(5));
         // dispatch($emailJob);

      EmailJobs::dispatch($details);
      // EmailJobs::dispatchNow($details);
                ->delay(now()->addSeconds(10));

   }

   //  public function kirim(){
   //  	// $details = array('email'=>"nanangfajaru@gmail.com");
	  //  	$details['email'] = 'nanangfajaru@gmail.com' ;
	  //   dispatch(new JobsMail($details));
	  //   dd('Berhasil');
   // }

}
