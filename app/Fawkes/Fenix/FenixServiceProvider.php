<?php namespace Fawkes\Fenix;

use Illuminate\Support\ServiceProvider;

class FenixServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('fenix', function()
        {
            return $this->app->make('oauth')->make('FenixEdu');
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['fenix'];
    }

}
