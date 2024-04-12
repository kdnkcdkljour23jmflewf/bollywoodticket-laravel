<?php

namespace App\Providers;
use App\Services\PaymentService;
use App\Services\PaymentInterface;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // dd(888);
        $this->app->bind(PaymentInterface::class,PaymentService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
