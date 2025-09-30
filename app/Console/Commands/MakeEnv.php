<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeEnv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-env';
    protected $signatures = 'make:env';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $envPath = base_path('.env');
        $examplePath = base_path('.env.example');

        if (File::exists($envPath)) {
            $this->warn('.env already exists!');
            return Command::SUCCESS;
        }

        if (File::exists($examplePath)) {
            File::copy($examplePath, $envPath);
            $this->info('.env file created from .env.example');
        } else {
            File::put($envPath, "APP_NAME=Laravel\nAPP_ENV=local\nAPP_KEY=\n");
            $this->info('.env file created with default values');
        }

        return Command::SUCCESS;
    }

}
