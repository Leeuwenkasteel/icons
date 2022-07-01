<?php
namespace Leeuwenkasteel\Icons;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Leeuwenkasteel\Icons\Console\InstallIconPackage;
use Leeuwenkasteel\Icons\Console\InstallIconMenuPackage;
use Leeuwenkasteel\Icons\View\Components\Css;
use Leeuwenkasteel\Icons\Http\Livewire\IconTable;
use Leeuwenkasteel\Icons\Http\Livewire\Search;
use Livewire;

class IconsServiceProvider extends ServiceProvider{
    public function boot(){
		Schema::defaultStringLength(255);
		
    	$this->loadRoutesFrom(__DIR__.'/routes/web.php');
    	$this->loadViewsFrom(__DIR__.'/resources/views', 'icons');
    	$this->loadTranslationsFrom(__DIR__.'/resources/lang', 'icons');
		
		$this->publishes([__DIR__.'/database/migrations' => database_path('migrations')], 'icons_migrations');
        $this->publishes([__DIR__.'/database/seeders' => database_path('seeders')], 'icons_seeders');
		
        if ($this->app->runningInConsole()) {
                $this->publishes([__DIR__.'/resources/assets' => public_path(),], 'icons-assets');
            $this->commands([
                InstallIconPackage::class,
                InstallIconMenuPackage::class,
            ]);
		  }
          $this->loadViewComponentsAs('icons', [
			Css::class,
		  ]);
		  
		  Livewire::component('icon-table', IconTable::class);
		  Livewire::component('search-icon', Search::class);
    }

    public function register(){
		 
    }
}