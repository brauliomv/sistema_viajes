<?php

namespace App\Console\Commands;

use App\Models\Worker;
use Illuminate\Console\Command;

class UpdateRideStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:ride-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       // return Command::SUCCESS;
       $workers = Worker::where('on_ride',1)->get();
       foreach($workers as $worker){
            $worker->on_ride = 0;
            $worker->update();
       }
    }
}
