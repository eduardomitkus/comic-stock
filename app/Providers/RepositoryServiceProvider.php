<?php

namespace App\Providers;

use App\Repository\ComicRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\ComicRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ComicRepositoryInterface::class, ComicRepository::class);
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
