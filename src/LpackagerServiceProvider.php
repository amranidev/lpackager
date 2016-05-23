<?php

namespace Amranidev\Lpackager;

use Illuminate\Support\ServiceProvider;

/**
 * Class ScaffoldInterfaceServiceProvider.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class LpackagerServiceProvider extends ServiceProvider
{
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
        // Load Views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'lpackager');
    }

    public function register()
    {
        $this->commands(['Amranidev\Lpackager\Commands\MakePackage', 'Amranidev\Lpackager\Commands\MakeController', 'Amranidev\Lpackager\Commands\MakeModel']);
    }
}
