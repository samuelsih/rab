<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Catch N+1 Query
        Model::preventLazyLoading(! $this->app->isProduction());

        // Throw exception on missing attr instead of null
        Model::preventsAccessingMissingAttributes();
    }
}
