<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        Gate::define('pengiriman', function(User $user){
            return $user->level !== 'f_manajer';
        });

        Gate::define('akuarium', function(User $user){
            return $user->level !== 'courier';
        });

        Gate::define('admin', function(User $user){
            return $user->level == 'admin';
        });
    }
}
