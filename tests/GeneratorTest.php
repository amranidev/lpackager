<?php

namespace Amranidev\Lpackager\Tests;

use Amranidev\Lpackager\FileSystem\Path;
use Amranidev\Lpackager\Generator\Generator;

class GeneratorTest extends TestCase
{
    /**
     * Generator instance.
     *
     * @var
     */
    public $generator;

    /**
     * Path instance.
     *
     * @var
     */
    public $path;

    /**
     * setUp.
     */
    public function setUp()
    {
        parent::setUp();

        $this->path = new Path('Kernel', 'Product');

        $this->generator = new Generator($this->path, "Kernel\Product");
    }

    /**
     * test if root dir was generated.
     */
    public function testMakeRootDirectory()
    {
        $this->assertEquals($this->path->root().' created successfully', $this->generator->root());
    }

    /**
     * test if resource dir was generated.
     */
    public function testResourceDirectory()
    {
        $this->assertEquals($this->path->resources().' created successfully', $this->generator->resources());
    }

    /**
     * test if database dir was generated.
     */
    public function testDatabaseDirectory()
    {
        $this->assertEquals($this->path->database().' created successfully', $this->generator->database());
    }

    /**
     * test if config dir was generated.
     */
    public function testConfigDirectory()
    {
        $this->assertEquals($this->path->config().' created successfully', $this->generator->config());
    }

    /**
     * test if src dir was generated.
     */
    public function testSrcDirectory()
    {
        $this->assertEquals($this->path->src().' created successfully', $this->generator->src());
    }

    /**
     * test if welcome controller was generated.
     */
    public function testGenerateWelcomeController()
    {
        $this->assertEquals($this->path->controller().' created successfully', $this->generator->generateWelcomeController());
    }

    /**
     * test if service provider was generated.
     */
    public function testGenerateServiceProvider()
    {
        $this->assertEquals($this->path->serviceProvider().' created successfully', $this->generator->generateServiceProvider());
    }

    /**
     * test if welcome view was generated.
     */
    public function testGenerateView()
    {
        $this->assertEquals($this->path->view().' created successfully', $this->generator->generateView());
    }

    /**
     * test if config file was generated.
     */
    public function testGenerateConfigFile()
    {
        $this->assertEquals($this->path->configFile().' created successfully', $this->generator->generateConfig());
    }

    /**
     * test if routes file was generated.
     */
    public function testGenerateRoute()
    {
        $this->assertEquals($this->path->routes().' created successfully', $this->generator->generateRoute());
    }
}
