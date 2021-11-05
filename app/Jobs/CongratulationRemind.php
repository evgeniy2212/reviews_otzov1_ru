<?php

namespace App\Jobs;

use App\Mail\CongratulationRemindEmail;
use App\Models\ImportantDateRemind;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CongratulationRemind implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach(ImportantDateRemind::whereImportantDateRemind(Carbon::today())->get()->chunk(100) as $reminds){
            foreach($reminds as $remind){
                Mail::to($remind->importantDate->user->email)
                    ->send(
                        new CongratulationRemindEmail($remind)
                    );
            }
        }
    }
}
