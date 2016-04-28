<?php

namespace Amranidev\lpackager\Generator;

use Amranidev\lpackager\FileSystem\Path;
use Armandiev\Lpackager\FileSystem\Filesystem;

class Generator extends Filesystem
{
    private $path;

    public function __construct(Path $path, $namespace)
    {
        $this->path = $path;
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

}
