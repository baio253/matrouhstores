<?php

namespace App\Providers;

use App\Product;
use App\Store;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use function foo\func;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability){
            if ($user->abilities()->contains($ability)) {
                return true;
            }
        });

        Gate::define('add_products',function (User $user, Store $store){
            return $store->user->is($user);
        });

        Gate::define('delete_products',function (User $user, Product $product){
            return $product->store->user->is($user);
        });

        Gate::define('delete_store',function (User $user, Store $store){
            return $store->user->is($user);
        });
    }
}
