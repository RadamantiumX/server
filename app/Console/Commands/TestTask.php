<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Table reset to 0';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //
    }
}
