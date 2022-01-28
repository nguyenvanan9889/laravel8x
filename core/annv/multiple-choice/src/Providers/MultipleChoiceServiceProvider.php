<?php
namespace Annv\MultipleChoice\Providers;
use Illuminate\Support\ServiceProvider;
class MultipleChoiceServiceProvider extends ServiceProvider {
	public function register()
    {
        
    }
	public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');        
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'multiple_choice');
        $this->publishes([
            __DIR__.'/../../assets' => public_path('assets'),
        ], 'multiple-choice-public-asset');
    }
}
