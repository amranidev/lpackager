<?php

namespace Amranidev\Lpackager\Tests;

use Amranidev\Lpackager\Tests\TestCase;

class PathTest extends TestCase
{
	/**
	 * package path.
	 * 
	 * @var $packagePath
	 */ 
    public $packagePath;

    /**
     * package name.
     * 
     * @var packageName
     */ 
    public $packageName;

    /**
     * Path instance.
     * 
     * @var $path
     */ 
    public $path;

    /**
     * SetUp.
     */ 
    public function setUp()
    {
        parent::setUp();
        
        $this->packagePath = "Kernel";
        
        $this->packageName = "Client";

        $this->path = new Path($this->packagePath, $this->packageName);
    }

    /**
     * test root path.
     */ 
    public function testRoot()
    {
        $this->assertEquals(base_path().'/'.'Kernel/Client', $this->path->root());
    }

    /**
     * test resources path.
     */ 
    public function testResources()
    {
        $this->assertEquals($this->path->root().'/resources/views', $this->path->resources());
    }

    /**
     * test database path.
     */ 
    public function testDatabase()
    {
        $this->assertEquals($this->path->root().'/database/migrations', $this->path->database());
    }

    /**
     * test config path.
     */ 
    public function testConfig()
    {
        $this->assertEquals($this->path->root().'/config', $this->path->config());
    }

    /**
     * test source controller path.
     */ 
    public function testSrc()
    {
        $this->assertEquals($this->path->root().'/src/Http/Controllers', $this->path->src());
    }

    /**
     * test routes path.
     */ 
    public function testRoutes()
    {
        $this->assertEquals($this->path->root().'/src/Http/routes.php', $this->path->routes());
    }

    /**
     * test controller path.
     */ 
    public function testController()
    {
        $this->assertEquals($this->path->root().'/src/Http/Controllers/WelcomeController.php', $this->path->controller());
    }

    /**
     * test service provider path.
     */ 
    public function testServiceProvider()
    {
        $this->assertEquals($this->path->root().'/src/'.$this->packageName.'ServiceProvider.php', $this->path->serviceProvider());
    }

    /**
     * test view path.
     */ 
    public function testView()
    {
    	$this->assertEquals($this->path->resources().'/welcome.blade.php',$this->path->view());
    }

    /**
     * test config file path.
     */ 
    public function testConfigFile()
    {
    	$this->assertEquals($this->path->config().'/config.php',$this->path->configFile());
    }

    /**
     * test get package method.
     */ 
    public function testGetPackage()
    {
    	$this->assertEquals($this->packageName,$this->path->getPackage());
    }

    /**
     * test get path method.
     */ 
    public function testGetPath()
    {
    	$this->assertEquals($this->packagePath,$this->path->getPath());
    }
}
