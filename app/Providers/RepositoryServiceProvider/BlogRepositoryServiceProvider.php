<?php

namespace App\Providers\RepositoryServiceProvider;

use App\Repositories\BlogRepository;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Blog;

class BlogRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            BlogRepositoryInterface::class,
            function()
            {
                return new BlogRepository(new Blog);
            }
        );
    }
}
