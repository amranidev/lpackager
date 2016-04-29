<?php

namespace Amranidev\Lpackager\FileSystem;

/**
 * class Path
 *
 * @package lpackager
 * @author Amrani Houssain <amranidev@gmail.com>
 */
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
     * @return String
     */
    public function root()
    {
        return base_path() . '/' . $this->path . '/' . $this->package;
    }

    /**
     * get resources path
     * 
     * @return String
     */ 
    public function resources()
    {
        return $this->root() . '/resources/views';
    }

    /**
     * get database/migration path
     * 
     * @return String
     */ 
    public function database()
    {
        return $this->root() . '/database/migrations';
    }

    /**
     * get config path
     * 
     * @return String
     */ 
    public function config()
    {
        return $this->root() . '/config';
    }

    /**
     * get src directory
     * 
     * @return String
     */ 
    public function src()
    {
        return $this->root() . '/src/Http/Controllers';
    }

    /**
     * get reoutes path
     * 
     * @return String
     */ 
    public function routes()
    {
        return $this->root() . '/src/Http/routes.php';
    }

    /**
     * get Cxontroller path
     * 
     * @return String
     */ 
    public function controller()
    {
        return $this->root() . '/src/Http/Controllers/WelcomeController.php';
    }

    /**
     * get ServiceProvider path
     * 
     * @return String
     */ 
    public function serviceProvider()
    {
        return $this->root() . '/src/' . $this->package . 'ServiceProvider.php';
    }

    /**
     * get view path
     * 
     * @return String
     */ 
    public function view()
    {
        return $this->root() . '/resources/views/welcome.blade.php';
    }

    /**
     * get config file
     * 
     * @return String
     */ 
    public function configFile()
    {
        return $this->config() . '/config.php';
    }

    /**
     * get package name
     * 
     * @return String
     */ 
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * get path
     * 
     * @return String
     */ 
    public function getPath()
    {
        return $this->path;
    }
}
