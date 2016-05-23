<?php

namespace Amranidev\Lpackager\Commands;

use Amranidev\Lpackager\Tests\TestCase;


class MakePackageTest extends TestCase
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
            'package'   => "Bobo",
            'path' => 'Kernel',
            'namespace' => "Kernel\Bobo"
        ]);

        $this->assertEquals(0, $code);
    }
}
