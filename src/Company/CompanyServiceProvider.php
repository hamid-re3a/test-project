<?php

namespace Company;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CompanyServiceProvider extends ServiceProvider
{
    private $namespace = 'Company\Http\Controllers';

    public function register()
    {


        if (!$this->app->runningInConsole()) {
            return;
        }
        if ($this->shouldMigrate()) {
            $this->loadMigrationsFrom([
                __DIR__ . '/database/migrations',
            ]);
        }
        $this->publishes([
            __DIR__ . '/database/migrations' => database_path('migrations'),
        ], 'promotion-migrations');
        $this->publishes([
            __DIR__ . '/database/seeders/' => database_path('seeders'),
        ], 'promotion-seeds');
        $this->publishes([
            __DIR__ . '/resources/lang' => resource_path('lang'),
        ], 'promotion-resources');
    }

    public function boot()
    {

        $this->registerHelpers();

        Route::prefix('api/')
            ->middleware('api')
//            ->namespace($this->namespace)
            ->group(__DIR__ . '/routes/api.php');

        if ($this->app->runningInConsole()) {
//            $this->seed();
        }

    }

    /**
     * Register helpers.
     */
    protected function registerHelpers()
    {
        if (file_exists($helperFile = __DIR__ . '/helpers/constants.php')) {
            require_once $helperFile;
        }

        if (file_exists($helperFile = __DIR__ . '/helpers/functions.php')) {
            require_once $helperFile;
        }
    }

    /**
     * Determine if we should register the migrations.
     *
     * @return bool
     */
    protected function shouldMigrate(): bool
    {
        return CompanyConfigure::$runsMigrations;
    }

    private function seed()
    {
        if (isset($_SERVER['argv']))
            if (array_search('db:seed', $_SERVER['argv'])) {
                CompanyConfigure::seed();
            }
    }

}
