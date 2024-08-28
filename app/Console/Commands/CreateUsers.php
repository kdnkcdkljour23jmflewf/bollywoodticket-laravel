<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
class CreateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:users {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Dummy Users for your App';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $numberOfUsers = $this->argument('count');
  
        for ($i = 0; $i < $numberOfUsers; $i++) { 
            Log::info('message');
        }  
  
        return 0;
    }
}
