<?php

namespace App\Providers;

use App\Qustion;
use App\Policies\QustionPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Qustion::class => QustionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // \Gate::define('update-qustion', function($user, $qustion){ //untuk memastikan update dan delete dilakukan oleh user itu sendiri alias sah
        //     return $user->id == $qustion->user->id;
        // });

        // \Gate::define('delete-qustion', function($user, $qustion){
        //     return $user->id == $qustion->user->id;
        // });
    }
}
