<?php
Route::group(['namespace' => 'Annv\Demo\Http\Controllers'], function(){
	Route::get('annv-demo-package', 'DemoController@annvDemoPage');
});