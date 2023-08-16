<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\MyServiceInterface;
use App\Services\MyService;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MyServiceInterface::class, MyService::class);
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
