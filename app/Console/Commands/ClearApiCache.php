<?php

namespace App\Console\Commands;

use App\Traits\WithApiRequests;
use Illuminate\Console\Command;

class ClearApiCache extends Command
{
    use WithApiRequests;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:clear-api-cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove user api cache';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->clearApiCache();
        $this->info('Cleared users api cache');
        return Command::SUCCESS;
    }
}
