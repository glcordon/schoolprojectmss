<?php

namespace Wave;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Wave\Facades\Wave as WaveFacade;
use Wave\TokenGuard;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Gate;

class WaveServiceProvider extends ServiceProvider
{

	public function register(){

	    $loader = AliasLoader::getInstance();
	    $loader->alias('Wave', WaveFacade::class);

	    $this->app->singleton('wave', function () {
	        return new Wave();
	    });

	    $this->loadHelpers();

	    $waveMiddleware = [
	    	\Illuminate\Auth\Middleware\Authenticate::class,
    		\Wave\Http\Middleware\TrialEnded::class,
    		\Wave\Http\Middleware\Cancelled::class,
    	];

    	$this->app->router->aliasMiddleware('token_api', \Wave\Http\Middleware\TokenMiddleware::class);
	    $this->app->router->pushMiddlewareToGroup('web', \Wave\Http\Middleware\WaveMiddleware::class);

	    $this->app->router->middlewareGroup('wave', $waveMiddleware);

	}

	public function boot(Router $router, Dispatcher $event){
		Relation::morphMap([
		    'users' => config('wave.user_model')
		]);

		if(!config('wave.show_docs')){
			Gate::define('viewLarecipe', function($user, $documentation) {
	            	return true;
	        });
	    }

	    $this->loadMigrationsFrom(realpath(__DIR__.'/../database/migrations'));

	    if(config('wave.billing', 'stripe') == 'braintree'){

	    	$this->app->register(\Laravel\Cashier\CashierServiceProvider::class);

	    	\Braintree_Configuration::environment(config('services.braintree.environment'));
			\Braintree_Configuration::merchantId(config('services.braintree.merchant_id'));
			\Braintree_Configuration::publicKey(config('services.braintree.public_key'));
			\Braintree_Configuration::privateKey(config('services.braintree.private_key'));
	    }

	}

	protected function loadHelpers()
    {
        foreach (glob(__DIR__.'/Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }

    protected function loadMiddleware()
    {
        foreach (glob(__DIR__.'/Http/Middleware/*.php') as $filename) {
            require_once $filename;
        }
    }

}