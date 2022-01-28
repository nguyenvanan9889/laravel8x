<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('clear', function(){
    Artisan::call('cache:clear');
    return response()->json(['message' => 'success'], 200);
});

Route::group(['middleware' => ['web'], 'namespace' => 'Annv\MultipleChoice\Http\Controllers'], function(){
    Route::get('multiple-choice', 'MultipleChoiceController@view');
});