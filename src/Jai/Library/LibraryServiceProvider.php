<?php namespace Jai\Library;

use Illuminate\Support\ServiceProvider;
use Jai\Library\Email\SwiftMailer;
use Jai\Library\Form\FormModel;

class LibraryServiceProvider extends ServiceProvider {

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
		$this->package('Jai/library');

        $this->bindMailer();
        $this->bindFormModel();

    }

    protected function bindMailer()
    {
        $this->app->bind('jmailer', function ()
        {
            return new SwiftMailer;
        });
    }

    protected function bindFormModel()
    {
        $this->app->bind('form_model', function ($app, $params) {
            // validator, repository
            return new FormModel($params[0], $params[1]);
        });
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}