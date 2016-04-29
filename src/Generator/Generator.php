<?php

namespace Amranidev\Lpackager\Generator;

use Amranidev\Lpackager\FileSystem\Filesystem;
use Amranidev\Lpackager\FileSystem\Path;
use Amranidev\Lpackager\Parser\NamespaceParser;

class Generator extends Filesystem
{
    private $path;

    private $namespaceParser;

    public function __construct(Path $path, $namespace)
    {
        $this->path = $path;

        $this->namespaceParser = new NamespaceParser($namepsace);
    }

    public function root()
    {
        $this->makeDir($this->path->root());
    }

    public function resources()
    {
        $this->makeDir($this->path->resources());
    }

    public function database()
    {
        $this->makeDir($this->path->database());
    }

    public function config()
    {
        $this->makeDir($this->path->config());
    }

    public function src()
    {
        $this->makeDir($this->path->src());
    }

    public function generateFiles()
    {
        $path = $this->path->getPath();

        $namespace = $this->namespaceParser->getNamepsace();

        $controllerNameSpace = $this->namespaceParser->controllerNameSpace();

        $package = $this->path->getPackage();

        file_put_contents($this->path->controller(), "<?php\n".view('lpackager::WelcomeController', compact('controllerNameSpace', 'package'))->render());

        file_put_contents($this->path->serviceProvider(), "<?php\n".view('lpackager::ServiceProvider', compact('package', 'namespace'))->render());

        file_put_contents($this->path->view(), view('lpackager::welcome')->render());

        file_put_contents($this->path->configFile(), view('lpackager::config', compact('package', 'path', 'namespace'))->render());
    }
}
