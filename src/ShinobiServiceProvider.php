<?php

namespace Caffe\Alcomponente;

use Exception;
use Illuminate\Support\Facades\Gate;
use Caffe\Alcomponente\Models\Role;
use Illuminate\Support\Facades\Blade;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Caffe\Alcomponente\Facades\Alcomponente;
use Caffe\Alcomponente\Models\Permission;

class AlcomponenteServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return null
     */
    public function boot()
    {
        $this->publishConfig();
        $this->publishMigrations();
        $this->loadMigrations();

        $this->registerGates();
        $this->registerBladeDirectives();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/alcomponente.php', 'alcomponente'
        );

        $this->app->singleton('alcomponente', function ($app) {
            $auth = $app->make('Illuminate\Contracts\Auth\Guard');

            return new \Caffe\Alcomponente\Alcomponente($auth);
        });
    }

    /**
     * Register the permission gates.
     * 
     * @return void
     */
    protected function registerGates()
    {
        Gate::before(function($user, $permission) {
            try {
                if (method_exists($user, 'hasPermissionTo')) {
                    $permission = Alcomponente::permission()->where('slug', $permission)->firstOrFail();

                    return $user->hasPermissionTo($permission) ?: null;
                }
            } catch (Exception $e) {
                // 
            }
        });
    }

    /**
     * Register the blade directives.
     *
     * @return void
     */
    protected function registerBladeDirectives()
    {
        Blade::directive('role', function ($expression) {
            return "<?php if (\\Alcomponente::isRole({$expression})): ?>";
        });

        Blade::directive('endrole', function ($expression) {
            return '<?php endif; ?>';
        });
    }

    /**
     * Publish the config file.
     * 
     * @return void
     */
    protected function publishConfig()
    {
        $this->publishes([
            __DIR__.'/../config/alcomponente.php' => config_path('alcomponente.php'),
        ], 'config');
    }

    /**
     * Publish the migration files.
     * 
     * @return void
     */
    protected function publishMigrations()
    {
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations'),
        ], 'migrations');
    }

    /**
     * Load our migration files.
     * 
     * @return void
     */
    protected function loadMigrations()
    {
        if (config('alcomponente.migrate', true)) {
            $this->loadMigrationsFrom(__DIR__.'/../migrations');
        }
    }
}
