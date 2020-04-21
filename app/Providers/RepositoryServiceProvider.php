<?php

namespace App\Providers;

use App\Repository\ComicRepository;
use App\Repository\MovementRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\ComicRepositoryInterface;
use App\Repository\MovementRepositoryInterface;

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
        $this->app->bind(MovementRepositoryInterface::class, MovementRepository::class);
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
