<?php

namespace App\Modules\Trip\Providers;

use App\Modules\Trip\Repositories\TripRepository;
use App\Modules\Trip\Repositories\TripRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class TripServiceProvider extends ServiceProvider
{
    private $moduleName = 'Trip';

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../' . $this->moduleName . '/Database/Migrations');
    }

    public function register(): void
    {
        $this->app->bind(TripRepositoryInterface::class, TripRepository::class);
    }
}
