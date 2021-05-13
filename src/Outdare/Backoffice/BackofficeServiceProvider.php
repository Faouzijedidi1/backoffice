<?php namespace Outdare\Backoffice;

use Illuminate\Support\ServiceProvider;

class BackofficeServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		include __DIR__.'/../../routes.php';
		$this->loadViewsFrom(__DIR__.'/../../views', 'backoffice');
		$this->loadTranslationsFrom(__DIR__.'/../../lang', 'backoffice');
		$this->publishes([__DIR__.'/../../config/' => app()->configPath().'/backoffice/'], 'backoffice');
		$this->commands(Commands\Install::class);
		$this->commands(Commands\Update::class);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerResourcesV5();
	}

	protected function registerResourcesV5()
	{
	    $userConfigFile    = app()->configPath().'/backoffice/backoffice.php';
	    $packageConfigFile = __DIR__.'/../../config/backoffice.php';
	    $config            = $this->app['files']->getRequire($packageConfigFile);

	    if (file_exists($userConfigFile)) {
	        $userConfig = $this->app['files']->getRequire($userConfigFile);
	        $config     = array_replace_recursive($config, $userConfig);
	    }

	    $this->app['config']->set('backoffice::backoffice', $config);
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [
		  "backoffice",
	    ];
	}

}
