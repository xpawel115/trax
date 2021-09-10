<?php

namespace App\Modules\Car\Providers;

use App\Modules\Car\Repositories\CarRepository;
use App\Modules\Car\Repositories\CarRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class CarServiceProvider extends ServiceProvider
{
    private $moduleName = 'Car';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../' . $this->moduleName . '/Database/Migrations');
    }

    public function register(): void
    {
        $this->app->bind(CarRepositoryInterface::class, CarRepository::class);
    }
}
