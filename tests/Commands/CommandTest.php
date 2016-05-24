<?php

namespace Amranidev\Lpackager\Commands;

use Amranidev\Lpackager\Tests\TestCase;

class CommandTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * test lpackager:package artisan command.
     *
     * @return void
     */
    public function testMakePackage()
    {
        $code = $this->artisan("lpackager:package", [
            'package'   => "Tobo",
            'path'      => 'Kernel',
            'namespace' => "Kernel\Tobo"
        ]);

        $this->assertEquals(0, $code);
    }

    /**
     * test lpackager:controller artisan command.
     *
     * @return void
     */
    public function testMakeController()
    {
        $code = $this->artisan('lpackager:controller', [
            'class'     => 'GoboController',
            'package'   => 'Tobo',
            'path'      => 'Kernel/Tobo',
            'namespace' => "Kernel\Tobo",
        ]);

        $this->assertEquals(0, $code);
    }

    /**
     * test lpackager:model artisan command.
     *
     * @return void
     */
    public function testMakeModel()
    {
        $code = $this->artisan('lpackager:model', [
            'class'     => 'Gobo',
            'path'      => 'Kernel/Tobo',
            'namespace' => "Kernel\Tobo",
        ]);

        $this->assertEquals(0, $code);
    }
}
