<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification; 
use App\Notifications\CreateFactoryNotification;
class CreateFactoryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $factory;
    public function __construct($factory)
    {
        $this->factory=$factory;
      
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Notification::route('mail', 'abhinendra@webmavens.com')->notify(new CreateFactoryNotification($this->factory));
    }
}
