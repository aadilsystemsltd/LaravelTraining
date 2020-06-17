<?php

namespace App\Providers\ServiceProvider;

//use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Repositories\BlogRepository;

use App\Services\BlogServices;
use App\Services\Interfaces\BlogServicesInterface;

use Illuminate\Support\ServiceProvider;
use App\Blog;

class BlogServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            BlogServicesInterface::class,
            function () {
                return new BlogServices(new BlogRepository(new Blog));
            }
        );
    }

    // public function register()
    // {
    //     $this->app->bind(
    //         BlogRepositoryInterface::class,
    //         function()
    //         {
    //             return new BlogRepository(new Blog);
    //         }
    //     );
    // }
}
