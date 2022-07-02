<?php

namespace App\Providers;

use App\Repositories\Rugby\RugbyRepository;
use App\Repositories\Rugby\RugbyRepositoryInterface;
use App\Repositories\Player\PlayerRepository;
use App\Repositories\Player\PlayerRepositoryInterface;
use App\Repositories\Nba\NbaRepository;
use App\Repositories\Nba\NbaRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class BaseRepositoryServiceProvider extends ServiceProvider
{

    /**
     * Bind the interface to an implementation repository class
     */
    public function register()
    {
        $this->app->bind(
            RugbyRepositoryInterface::class,
            RugbyRepository::class
        );

        $this->app->bind(
            PlayerRepositoryInterface::class,
            PlayerRepository::class
        );
        
        $this->app->bind(
            NbaRepositoryInterface::class,
            NbaRepository::class
        );
    }
    
}
