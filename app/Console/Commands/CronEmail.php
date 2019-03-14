<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\WeeklyNews;
use App\Property;
use Illuminate\Support\Facades\Mail;
use App\Mail\WeeklyNewsletter;

class CronEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newsletter:weekly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Weekly Newsletter';

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
    public function handle(Property $prop)
    {
        $properties = $prop->allProps();
        
        try {
            Mail::to('example@me.com')->send(new WeeklyNewsletter($properties));
        } catch (\Throwable $th) {
            $errors = [
                'message' => 'Your Weekly Email Newsletter Has Failed',
                'reason' => $th->getMessage()
            ];
            
        }
    }
}
