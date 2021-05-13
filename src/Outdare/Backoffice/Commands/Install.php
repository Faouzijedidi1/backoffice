<?php

namespace Outdare\Backoffice\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use Artisan;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backoffice:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install backoffice';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      echo exec("mkdir ".public_path()."/outdareBackoffice");
      echo exec("mkdir ".public_path()."/outdareBackoffice/js");
    }
}
