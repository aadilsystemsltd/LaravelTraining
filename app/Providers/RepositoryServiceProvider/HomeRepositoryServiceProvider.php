<?php

namespace App\Providers\RepositoryServiceProvider;

use Illuminate\Support\ServiceProvider;
use App\Repositories\HomeRepository;
use App\Repositories\Interfaces\HomeRepositoryInterface;

class HomeRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            HomeRepositoryInterface::class,
            HomeRepository::class
        );
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
