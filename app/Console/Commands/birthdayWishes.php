<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class birthdayWishes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:birthday-wishes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send birthday wishes to users whose birthday is today';

    /**
     * Execute the console command.
     */
    public function handle()
    {
           $currentDateTime = now('America/Chicago');
           if ($currentDateTime->hour == 5 && $currentDateTime->minute == 0) {
            Mail::raw("Happy Birthday, Abhinendra!", function ($message){
                $message->to('abhinendra@webmavens.com')
                        ->subject('Happy Birthday!');
            });
            $this->info("Birthday wishes sent to: abhinendra@webmavens.com");
        } else {
            $this->info("No birthday wishes sent. Current time is not 5 AM CST.");
        }
    }
}
