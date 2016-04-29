<?php

namespace Amranidev\Lpackager\FileSystem;

class Path
{
    /**
     * package name
     * 
     * @var package
     */
    private $package;

    /**
     * package path
     * 
     * @var path
     */
    private $path;

    /**
     * Create new Path instance
     * 
     * @param String $package;
     * @param String $path
     */
    public function __construct($path, $package)
    {
        $this->package = ucfirst($package);

        $this->path = $path;
    }

    /**
     * get package root path
     * 
     * @return Mixed
     */
    public function root()
    {
        return base_path() . '/' . $this->path . '/' . $this->package;
    }

    public function resources()
    {
        return $this->root() . '/resources/views';
    }

    public function database()
    {
        return $this->root() . '/database/migrations';
    }

    public function config()
    {
        return $this->root() . '/config';
    }

    public function src()
    {
        return $this->root() . '/src/Http/Controllers';
    }

    public function routes()
    {
        return $this->root() . '/src/Http/routes.php';
    }

    public function controller()
    {
        return $this->root() . '/src/Http/Controllers/WelcomeController.php';
    }

    public function serviceProvider()
    {
        return $this->root() . '/src/' . $this->package . 'ServiceProvider.php';
    }

    public function view()
    {
        return $this->root() . '/resources/views/welcome.blade.php';
    }

    public function configFile()
    {
        return $this->config() . '/config.php';
    }

    public function getPackage()
    {
        return $this->package;
    }

    public function getPath()
    {
        return $this->path;
    }
}
