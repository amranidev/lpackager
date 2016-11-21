<?php

namespace Amranidev\Lpackager\FileSystem;

/**
 * class Path.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class Path
{
    /**
     * Package name.
     *
     * @var string package
     */
    private $package;

    /**
     * Package path.
     *
     * @var string path
     */
    private $path;

    /**
     * Create a new Path instance.
     *
     * @param string $package;
     * @param string $path
     */
    public function __construct($path, $package)
    {
        $this->package = ucfirst($package);

        $this->path = $path;
    }

    /**
     * Get root path.
     *
     * @return string
     */
    public function root()
    {
        return base_path().'/'.$this->path.'/'.$this->package;
    }

    /**
     * Get resources path.
     *
     * @return string
     */
    public function resources()
    {
        return $this->root().'/resources/views';
    }

    /**
     * Get database/migration path.
     *
     * @return string
     */
    public function database()
    {
        return $this->root().'/database/migrations';
    }

    /**
     * Get config path.
     *
     * @return string
     */
    public function config()
    {
        return $this->root().'/config';
    }

    /**
     * Get src path.
     *
     * @return string
     */
    public function src()
    {
        return $this->root().'/src/Http/Controllers';
    }

    /**
     * Get reoutes path.
     *
     * @return string
     */
    public function routes()
    {
        return $this->root().'/routes';
    }

    /**
     * Get Controller path.
     *
     * @return string
     */
    public function controller()
    {
        return $this->root().'/src/Http/Controllers/WelcomeController.php';
    }

    /**
     * Get ServiceProvider path.
     *
     * @return string
     */
    public function serviceProvider()
    {
        return $this->root().'/src/'.$this->package.'ServiceProvider.php';
    }

    /**
     * Get view path.
     *
     * @return string
     */
    public function view()
    {
        return $this->root().'/resources/views/welcome.blade.php';
    }

    /**
     * Get config file.
     *
     * @return string
     */
    public function configFile()
    {
        return $this->config().'/config.php';
    }

    /**
     * Get package name.
     *
     * @return string
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * Get path.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
}
