<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RiakServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }
    
    protected $defer = true;
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->singleton(Connection::class, function ($app) {
          return new Connection(config('riak'));
      });
    }
}