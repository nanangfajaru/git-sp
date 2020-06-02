<?php

namespace Modules\SendMail\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use Modules\SendMail\Entities\SendmailModel;
use Modules\SendMail\Jobs\EmailJobs;

class SendMailAnggaranDasar extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'email:anggarandasar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Mail Anggaran Dasar - Daily Notification';

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
        $details = SendmailModel::getSP()->first();
        
        EmailJobs::dispatchNow($details);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
