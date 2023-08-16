<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Custom\Imagedata;
use App\Custom\Image;

class ImageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(Imagedata::class, function ($app) {
        //     return new Image();
        // });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(Imagedata::class, function ($app) {
            return new Image();
        });
    }
}
