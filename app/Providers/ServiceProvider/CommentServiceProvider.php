<?php

namespace App\Providers\ServiceProvider;

use App\Comment;
use Illuminate\Support\ServiceProvider;

use App\Repositories\CommentRepository;
// use App\Repositories\Interfaces\CommentRepositoryInterface;

use App\Services\Interfaces\CommentServicesInterface;
use App\Services\CommentServices;

class CommentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CommentServicesInterface::class,
            function()
            {
                return new CommentServices(new CommentRepository(new Comment));
            }
        );
    }


    // public function register()
    // {
    //     $this->app->bind(
    //         CommentRepositoryInterface::class,
    //         function()
    //         {
    //             return new CommentRepository(new Comment);
    //         }
    //     );
    // }

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
