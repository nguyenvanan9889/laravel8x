<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use App\Jobs\ProcessPodcast;
use App\Services\AudioProcessor;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(\App\Helpers\Pays\Contract\PayInterface::class, function($app){
            return new \App\Helpers\Pays\Baokim\Baokim;
        });
        $this->app->singleton(\App\Helpers\Dbs\Contract\DbInterface::class, function($app){
            return new \App\Helpers\Dbs\Mysql\Mysql;
        });
        \Validator::extend('wallet_balance', function ($attribute, $value, $parameters, $validator) {
            if ($value == 1) {
                return $parameters[0] > 0;
            }
            elseif ($value == 2) {
                return $parameters[1] > 0;
            }
            return true;
        });
        \Validator::replacer('wallet_balance', function($message, $attribute, $rule, $parameters) {
            return 'Số dư trong ví không đủ';
        });
        $this->app->bind(\App\Services\Logs\LogInterface::class, \App\Services\Logs\Db::class);
        $this->app->bind(\App\Services\Logs\LogInterface::class, \App\Services\Logs\File::class);
        $this->app->bind(\App\Services\Payment\Contract\PaymentInterface::class, function(){
            $payment = request()->input('payment');
            if ($payment == 'baokim') {
                return new \App\Services\Payment\Baokim;
            }
            if ($payment == 'vnpay') {
                return new \App\Services\Payment\Vnpay;
            }
        });
        $this->app->when(\App\Http\Controllers\ProductController::class)
            ->needs(\App\Services\Voucher\Contract\VoucherInterface::class)
            ->give(\App\Services\Voucher\Product::class);
        $this->app->when(\App\Http\Controllers\CourseController::class)
            ->needs(\App\Services\Voucher\Contract\VoucherInterface::class)
            ->give(\App\Services\Voucher\Course::class);
        // queue
        $this->app->bindMethod([ProcessPodcast::class, 'handle'], function ($job, $app) {
            return $job->handle($app->make(AudioProcessor::class));
        });
        // macro
        \Str::macro('tna', function($str){
            return $str;
        });
        Collection::macro('squared', function(){
            return $this->map(function($item){
                return $item * $item;
            });
        });
        Collection::macro('plus', function($number){
            return $this->map(function($item) use ($number) {
                return $item + $number;
            });
        });
    }
}
