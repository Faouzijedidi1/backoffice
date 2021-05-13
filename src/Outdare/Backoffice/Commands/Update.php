<?php

namespace Outdare\Backoffice\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use Artisan;

class Update extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backoffice:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update backoffice';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      echo exec("npm --prefix ./vendor/etnos/backoffice/client install ./vendor/etnos/backoffice/client");
      echo exec("npm --prefix ./vendor/etnos/backoffice/client update outdare-dashboard --save");
      echo exec("gulp --gulpfile ./vendor/etnos/backoffice/client/gulpfile.js --cwd ./vendor/etnos/backoffice/client");
      echo exec("cp -r ./vendor/etnos/backoffice/public/js/* ".public_path()."/outdareBackoffice/js");
    }
}
