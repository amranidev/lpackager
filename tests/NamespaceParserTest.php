<?php

namespace Amranidev\Lpackager\Tests;

use Amranidev\Lpackager\Parser\NamespaceParser;

class NamespaceParserTest extends TestCase
{
    /**
     * package namespace.
     *
     * @var
     */
    public $namespace;

    /**
     * NamespaceParser instance.
     *
     * @var
     */
    public $parser;

    /**
     * setUp.
     */
    public function setUp()
    {
        parent::setUp();

        $this->namespace = "Kernel\Client";

        $this->parser = new NamespaceParser($this->namespace);
    }

    /**
     * test contoller namespace.
     */
    public function testControllerNameSpace()
    {
        $this->assertEquals("Kernel\Client\Http\Controllers", $this->parser->controllerNameSpace());
    }

    /**
     * test getNamespace method.
     */
    public function testGetNamespace()
    {
        $this->assertEquals("Kernel\Client", $this->parser->getNamespace());
    }
}
