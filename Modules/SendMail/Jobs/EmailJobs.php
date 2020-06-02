<?php

namespace Modules\SendMail\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Mail; 

class EmailJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
        // $this->details['email'] ;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = array(
                        'email'               => $this->details->email,
                        'serikat_pekerja_desc'=> $this->details->serikat_pekerja_desc,
                    );
        // dd($this->details->email);
        // Mail::to('nanangfajaru@gmail.com')->send(new Modules\SendMail\Emails\SendMail()) ;

        // $email = new \Modules\SendMail\Emails\SendMail();
        // Mail::to('nanangfajaru@gmail.com')->send($email);
        Mail::send('sendmail::mail', $data, function ($message) {
            $message->from('sp.kemnaker@gmail.com','No Replay - Aplikasi Serikat Pekerja - Kemnaker');
            // $message->sender('john@johndoe.com', 'John Doe');
        
            $message->to($this->details->email, $this->details->serikat_pekerja_desc);
        
            // $message->cc('john@johndoe.com', 'John Doe');
            // $message->bcc('john@johndoe.com', 'John Doe');
        
            // $message->replyTo('john@johndoe.com', 'John Doe');
        
            $message->subject('Serikat Pekerja Notification');
        
            // $message->priority(3);
        
            // $message->attach('pathToFile');
        });
    }
}
