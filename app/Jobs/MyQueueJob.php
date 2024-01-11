<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Web\Bookticket;
use Auth;

class MyQueueJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $input;
    protected $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($input,$id)
    {
        $this->input = $input;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // dd($this->input);
        Bookticket::insert(['movieid'=>$this->id,'seatbook'=>json_encode($this->input['ticket_detail']),'created_by'=>Auth::guard('web')->user()->id]);
        // dd($this->input);
        logger('Job processed!');
    }
}
