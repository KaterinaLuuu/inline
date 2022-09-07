<?php

namespace App\Providers;

use App\Contracts\CommentRepositoryContract;
use App\Contracts\CommentServiceContract;
use App\Contracts\PostRepositoryContract;
use App\Contracts\PostServiceContract;
use App\Repositoryes\CommentRepository;
use App\Repositoryes\PostRepository;
use App\Services\CommentService;
use App\Services\PostService;
use Illuminate\Support\ServiceProvider;

class ServiceRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CommentRepositoryContract::class, CommentRepository::class);
        $this->app->singleton(CommentServiceContract::class, CommentService::class);
        $this->app->singleton(PostRepositoryContract::class, PostRepository::class);
        $this->app->singleton(PostServiceContract::class, PostService::class);
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
