<?php

namespace Amranidev\Lpackager\Generator;

use Amranidev\Lpackager\FileSystem\Path;
use Amranidev\Lpackager\FileSystem\Filesystem;
use Amranidev\Lpackager\Parser\NamespaceParser;

/**
 * class Generator.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class Generator extends Filesystem
{
    /**
     * Path instance.
     *
     * @var \Amranidev\Lpackager\FileSystem\Path
     */
    private $path;

    /**
     * NamespaceParser instance.
     *
     * @var \Amranidev\Lpackager\Parser\NamespaceParser
     */
    private $namespaceParser;

    /**
     * Create new Generator instance.
     *
     * @param \Amranidev\Lpackager\FileSystem\Path
     * @param string $namespace
     *
     * @return void
     */
    public function __construct(Path $path, $namespace)
    {
        $this->path = $path;

        $this->namespaceParser = new NamespaceParser($namespace);
    }

    /**
     * Create root directory.
     *
     * @return string
     */
    public function root()
    {
        $this->makeDir($this->path->root());

        return $this->path->root().' created successfully';
    }

    /**
     * Create resources directory.
     *
     * @return string
     */
    public function resources()
    {
        $this->makeDir($this->path->resources());

        return $this->path->resources().' created successfully';
    }

    /**
     * Create database directory.
     *
     * @return string
     */
    public function database()
    {
        $this->makeDir($this->path->database());

        return $this->path->database().' created successfully';
    }

    /**
     * Create config directory.
     *
     * @return string
     */
    public function config()
    {
        $this->makeDir($this->path->config());

        return $this->path->config().' created successfully';
    }

    /**
     * Create src directory.
     *
     * @return string
     */
    public function src()
    {
        $this->makeDir($this->path->src());

        return $this->path->src().' created successfully';
    }

    /**
     * Generate welcomeController.
     *
     * @return string
     */
    public function generateWelcomeController()
    {
        $this->make($this->path->controller(), "<?php\n\n".view('lpackager::WelcomeController', ['controllerNameSpace' => $this->namespaceParser->controllerNameSpace(), 'package' => $this->path->getPackage()])->render());

        return $this->path->controller().' created successfully';
    }

    /**
     * Generate ServiceProvider.
     *
     * @return string
     */
    public function generateServiceProvider()
    {
        $this->make($this->path->serviceProvider(), "<?php\n\n".view('lpackager::ServiceProvider', ['package' => $this->path->getPAckage(), 'namespace' => $this->namespaceParser->getNamespace()])->render());

        return $this->path->serviceProvider().' created successfully';
    }

    /**
     * Generate WelcomeView.
     *
     * @return string
     */
    public function generateView()
    {
        $this->make($this->path->view(), view('lpackager::welcome', ['package' => $this->path->getPAckage(), 'namespace' => $this->namespaceParser->getNamespace()])->render());

        return $this->path->view().' created successfully';
    }

    /**
     * Generate config file.
     *
     * @return string
     */
    public function generateConfig()
    {
        $this->make($this->path->configFile(), "<?php\n\n".view('lpackager::config', ['package' => $this->path->getPAckage(), 'namespace' => $this->namespaceParser->getNamespace(), 'path' => $this->path->getPath()])->render());

        return $this->path->configFile().' created successfully';
    }

    /**
     * Generate routes file.
     *
     * @return string
     */
    public function generateRoute()
    {
        $this->makeDir($this->path->routes());

        $this->make($this->path->routes().'/web.php', "<?php\n\n".view('lpackager::routes', ['controllerNameSpace' => $this->namespaceParser->controllerNameSpace(), 'package' => $this->path->getPackage()])->render());

        return $this->path->routes().'/web.php created successfully';
    }
}
