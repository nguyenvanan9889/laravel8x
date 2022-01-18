<?php
namespace Annv\Demo\Providers;
use Illuminate\Support\ServiceProvider;
class DemoServiceProvider extends ServiceProvider {
	public function register()
    {
 		
    }
	public function boot()
    {
    	$this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
    	$this->loadViewsFrom(__DIR__.'/../../resources/views/', 'annv-demo');
    }
}