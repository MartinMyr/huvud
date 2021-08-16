<?php

namespace App\Providers;

use App\Services\MigraineLog\MigraineLogInterface;
use App\Services\MigraineLog\MigraineLogService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(MigraineLogInterface::class, MigraineLogService::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
