<?php
namespace Leeuwenkasteel\Icons\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Artisan;

class InstallIconMenuPackage extends Command
{
    protected $signature = 'icon-menu:install';

    protected $description = 'Install the IconPackage';

    public function handle()
    {
        $this->callSilent('icon:install');
        $this->callSilent('db:seed', ['--class' => 'MenuIconSeeder']);

        $this->info("The packages is installed, get start with it");
    }
}