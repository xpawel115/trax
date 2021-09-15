<?php

namespace App\Providers;

use App\Modules\Car\Models\Car;
use App\Modules\Car\Policies\CarPolicy;
use App\Modules\Trip\Models\Trip;
use App\Modules\Trip\Policies\TripPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Car::Class  => CarPolicy::class,
        Trip::Class  => TripPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
    }
}
