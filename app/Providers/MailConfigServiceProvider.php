<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Config::set('mail.mailers.smtp.host', 'smtp.gmail.com');
        \Config::set('mail.mailers.smtp.port', 465);
        \Config::set('mail.mailers.smtp.username', 'nguyenvanan9889@gmail.com');
        \Config::set('mail.mailers.smtp.password', 'knhddkzugcmsgqvu');
        \Config::set('mail.mailers.smtp.encryption', 'ssl');
        \Config::set('mail.from.address', 'nguyenvanan9889@gmail.com');
        \Config::set('mail.from.name', 'nguyenvanan9889');
    }
}
