<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

use Modules\SendMail\Entities\SendmailModel;
use Modules\SendMail\Jobs\EmailJobs;

class dailydelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exec:dailydelete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete table tes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        // DB::table('tes')->insert( [ 'nama' => 'Nanang Fajar' ]);
        $details = SendmailModel::getSP()->first();
        
        EmailJobs::dispatchNow($details);
    }
}
