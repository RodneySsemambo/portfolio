<?php

namespace App\Jobs;

use App\Mail\sendMailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class blogPost implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('ssemamborodney94@gmail.com')->send(new sendMailable());
    }
}
