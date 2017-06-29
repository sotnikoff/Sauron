<?php

namespace App\Console\Commands;

use App\Jobs\CheckWeb;
use Illuminate\Console\Command;
use App\Jobs\SendTelegramMessage;

class CheckWebResourse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sauron:check {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sauron console command to check the availability of a web resource';

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
        dispatch(new CheckWeb($this->argument('url')));
    }
}
