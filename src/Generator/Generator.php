<?php

namespace Amranidev\Lpackager\Generator;

use Amranidev\Lpackager\FileSystem\Filesystem;
use Amranidev\Lpackager\FileSystem\Path;
use Amranidev\Lpackager\Parser\NamespaceParser;

/**
 * class Generator
 *
 * @package lpackage
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class Generator extends Filesystem
{
    /**
     * path instance
     * @var $path
     */
    private $path;

    /**
     * namespaceParser instance
     *
     * @var $namespaceParser
     */
    private $namespaceParser;

    /**
     * create new Generator instance
     */
    public function __construct(Path $path, $namespace)
    {
        $this->path = $path;

        $this->namespaceParser = new NamespaceParser($namespace);
    }

    /**
     * create root directory
     */
    public function root()
    {
        $this->makeDir($this->path->root());
    }

    /**
     * create resources directory
     */
    public function resources()
    {
        $this->makeDir($this->path->resources());
    }

    /**
     * create database directory
     */
    public function database()
    {
        $this->makeDir($this->path->database());
    }

    /**
     * create config directory
     */
    public function config()
    {
        $this->makeDir($this->path->config());
    }

    /**
     * create src directory
     */
    public function src()
    {
        $this->makeDir($this->path->src());
    }

    /**
     * generate files
     * 
     * @return void
     */
    public function generateFiles()
    {
        $path = $this->path->getPath();

        $namespace = $this->namespaceParser->getNamespace();

        $controllerNameSpace = $this->namespaceParser->controllerNameSpace();

        $package = $this->path->getPackage();

        file_put_contents($this->path->controller(), "<?php\n\n" . view('lpackager::WelcomeController', compact('controllerNameSpace', 'package'))->render());

        file_put_contents($this->path->serviceProvider(), "<?php\n\n" . view('lpackager::ServiceProvider', compact('package', 'namespace'))->render());

        file_put_contents($this->path->view(), view('lpackager::welcome')->render());

        file_put_contents($this->path->configFile(),"<?php\n\n" . view('lpackager::config', compact('package', 'path', 'namespace'))->render());

        file_put_contents($this->path->routes(), "<?php\n\n" . view('lpackager::routes', compact('package', 'controllerNameSpace'))->render());
    }
}
