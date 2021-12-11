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

Route::group(['middleware' => ['web', 'App\Http\Middleware\Test', 'throttle:limit'], 'namespace' => 'App\Http\Controllers'], function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('alo', 'HomeController@alo')->name('alo');
    Route::get('blo', 'HomeController@blo')->name('blo');
    Route::get('without-middleware', 'HomeController@blo')->withoutMiddleware('App\Http\Middleware\Test');
    Route::get('notifications', 'HomeController@notifications');
    Route::get('mail', 'HomeController@mail')->name('mail');
    Route::get('mark-as-read-notification', 'HomeController@markAsReadNotification')->name('mark-as-read-notification');
    Route::get('insert-comment', 'HomeController@insertComment')->name('insert-comment');
    Route::get('sys-kpi-notification', 'HomeController@sysKpiNotification');
    Route::post('csrf', 'HomeController@csrf');
    Route::view('/view', 'alo', ['name' => 'an']);
    Route::get('model-binding/{user:email}', function(App\models\User $user){
        echo '<pre>'; var_dump($user); die(); echo '</pre>';
    });
    Route::get('pay/{type}', 'HomeController@pay');
    Route::get('db', 'HomeController@db');
    Route::get('edit', 'HomeController@edit');
    Route::get('morph-one-to-one', 'HomeController@morphOneToOne');
    Route::get('morph-one-to-many', 'HomeController@morphOneToMany');
    Route::get('morph-many-to-many', 'HomeController@morphManyToMany');
    Route::get('exception', 'HomeController@exception');
    Route::get('exception2', 'HomeController@exception2');
    Route::get('exception-unauthorized', 'HomeController@exceptoinUnauthorized');
    Route::get('full-text-search', 'HomeController@fullTextSearch');
    Route::get('artisan-test/{email}', function($email){
        Artisan::call('send:mail', compact('email'));
    });
    Route::get('macro', 'HomeController@macro');
    Route::match(['get', 'post'], 'validation', 'HomeController@validation');
    Route::match(['get', 'post'], 'validation2', 'HomeController@validation2');
    Route::match(['get', 'post'], 'validation3', 'HomeController@validation3');
    Route::get('mix', 'HomeController@mix');
    Route::get('binding-interface', 'HomeController@bindingInterface');
    Route::get('payment-binding-interface-based-param', 'HomeController@payment');
    Route::get('voucher-binding-interface-based-product-controller', 'ProductController@apply');
    Route::get('voucher-binding-interface-based-course-controller', 'CourseController@apply');
    Route::get('serialize', 'HomeController@serialize');
    Route::get('contains', 'HomeController@contains');
    Route::get('mail-normal', 'HomeController@mailTrap');
    Route::get('mail-queue-auto', 'HomeController@mailQueueAuto');
    Route::get('mail-queue-manual', 'HomeController@mailQueueManual');
    Route::get('collection', 'HomeController@collection');
    Route::get('collection-macro', 'HomeController@collectionMacro');
    Route::get('storage', 'HomeController@storage');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
