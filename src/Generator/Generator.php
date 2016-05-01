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

        return $this->path->root() . " : successfully generated";
    }

    /**
     * create resources directory
     */
    public function resources()
    {
        $this->makeDir($this->path->resources());
        
        return $this->path->resources() . " : successfully generated";
    }

    /**
     * create database directory
     */
    public function database()
    {
        $this->makeDir($this->path->database());

        return $this->path->database() . " : successfully generated";
    }

    /**
     * create config directory
     */
    public function config()
    {
        $this->makeDir($this->path->config());

        return $this->path->config() . " : successfully generated";
    }

    /**
     * create src directory
     */
    public function src()
    {
        $this->makeDir($this->path->src());

        return $this->path->src() . " : successfully generated";
    }

    /**
     * generate welcomeController
     */
    public function generateWelcomeController()
    {
        $this->make($this->path->controller(), "<?php\n\n" . view('lpackager::WelcomeController', ['controllerNameSpace' => $this->namespaceParser->controllerNameSpace(), 'package' => $this->path->getPackage()])->render());
        
        return $this->path->controller() . " : successfully generated";
    }

    /**
     * generate ServiceProvider
     */
    public function generateServiceProvider()
    {
        $this->make($this->path->serviceProvider(), "<?php\n\n" . view('lpackager::ServiceProvider', ['package'=> $this->path->getPAckage(), 'namespace' => $this->namespaceParser->getNamespace()])->render());
        
        return $this->path->serviceProvider() . " : successfully generated";
    }

    /**
     * generate WelcomeView
     */
    public function generateView()
    {
        $this->make($this->path->view(), view('lpackager::welcome', ['package'=> $this->path->getPAckage(), 'namespace' => $this->namespaceParser->getNamespace()])->render());
    
        return $this->path->view() . " : successfully generated";
    }

    /**
     * generate Config file
     */
    public function generateConfig()
    {
        $this->make($this->path->configFile(), "<?php\n\n" . view('lpackager::config', ['package'=> $this->path->getPAckage(), 'namespace' => $this->namespaceParser->getNamespace(), 'path' => $this->path->getPath()])->render());
        
        return $this->path->configFile() . " : successfully generated";
    }

    /**
     * generate routes file
     */
    public function generateRoute()
    {
        $this->make($this->path->routes(), "<?php\n\n" . view('lpackager::routes', ['controllerNameSpace' => $this->namespaceParser->controllerNameSpace(), 'package' => $this->path->getPackage()])->render());
    
        return $this->path->routes() . " : successfully generated";
    }
}
