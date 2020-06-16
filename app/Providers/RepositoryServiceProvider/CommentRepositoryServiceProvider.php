<?php

namespace App\Providers\RepositoryServiceProvider;

use App\Comment;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CommentRepository;
use App\Repositories\Interfaces\CommentRepositoryInterface;

class CommentRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CommentRepositoryInterface::class, function()
            {
                return new CommentRepository(new Comment);
            }
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
