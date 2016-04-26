<?php

namespace Amranidev\Lpackager;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

/**
 * Class ScaffoldInterfaceServiceProvider
 *
 * @package scaffold-interface
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
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'lpackager');
    }

    public function register()
    {
        $this->commands([Commands\MakePackage::class]);
    }
}
