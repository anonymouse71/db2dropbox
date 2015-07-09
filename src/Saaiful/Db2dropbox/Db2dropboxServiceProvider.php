<?php namespace Saaiful\Db2dropbox;
use Illuminate\Support\ServiceProvider;
class Db2dropboxServiceProvider extends ServiceProvider {
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    
    /**
     * Publish asset
     */
	public function boot() {
		$this->publishes([
            realpath(__DIR__.'/../../config/config.php') => config_path('db2dropbox.php'),
            realpath(__DIR__.'/../../migrations') => $this->app->databasePath().'/migrations',
            realpath(__DIR__.'/../../models') => '/app',
		]);
        $this->loadViewsFrom(__DIR__.'/../../views', 'db2dropbox');
        $this->loadTranslationsFrom(__DIR__.'/../../translations', 'db2dropbox');
	}


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->bindShared('Db2dropbox', function() {
		return new Db2dropbox;
	});
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return array("Db2dropbox");
    }
}