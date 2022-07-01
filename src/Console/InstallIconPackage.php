<?php
namespace Leeuwenkasteel\Icons\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Artisan;

class InstallIconPackage extends Command
{
    protected $signature = 'icon:install';

    protected $description = 'Install the IconPackage';

    public function handle()
    {
        $this->callSilent('vendor:publish', ['--tag' => 'icons_migrations']);
        $this->callSilent('migrate');
        $this->callSilent('vendor:publish', ['--tag' => 'icons_seeders']);
        $this->callSilent('db:seed', ['--class' => 'IconSeeder']);
        $this->callSilent('vendor:publish', ['--tag' => 'icons-assets']);

        $this->info("The packages is installed, get start with it");
    }
}