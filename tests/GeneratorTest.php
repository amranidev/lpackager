<?php

namespace Amranidev\Lpackager\Tests;

use Amranidev\Lpackager\FileSystem\Path;
use Amranidev\Lpackager\Generator\Generator;
use Amranidev\Lpackager\Tests\TestCase;

class GeneratorTest extends TestCase
{
    public $generator;

    public $path;

    public function setUp()
    {
        parent::setUp();

        $this->path = new Path("Kernel", "Product");

        $this->generator = new Generator($this->path, "Kernel\Product");
    }

    public function testMakeRootDirectory()
    {
        $this->assertEquals($this->path->root().' created successfully', $this->generator->root());
    }

    public function testResourceDirectory()
    {
        $this->assertEquals($this->path->resources().' created successfully', $this->generator->resources());
    }

    public function testDatabaseDirectory()
    {
        $this->assertEquals($this->path->database().' created successfully', $this->generator->database());
    }

    public function testConfigDirectory()
    {
        $this->assertEquals($this->path->config().' created successfully', $this->generator->config());
    }

    public function testSrcDirectory()
    {
        $this->assertEquals($this->path->src().' created successfully', $this->generator->src());
    }

    public function testGenerateWelcomeController()
    {
        $this->assertEquals($this->path->controller().' created successfully', $this->generator->generateWelcomeController());
    }

    public function testGenerateServiceProvider()
    {
        $this->assertEquals($this->path->serviceProvider().' created successfully', $this->generator->generateServiceProvider());
    }

    public function testGenerateView()
    {
        $this->assertEquals($this->path->view().' created successfully', $this->generator->generateView());
    }

    public function testGenerateConfigFile()
    {
        $this->assertEquals($this->path->configFile().' created successfully', $this->generator->generateConfig());
    }

    public function testGenerateRoute()
    {
        $this->assertEquals($this->path->routes().' created successfully', $this->generator->generateRoute());
    }
}
