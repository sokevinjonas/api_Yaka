<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:reset-streaks')]
#[Description('Command description')]
class ResetStreaks extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
