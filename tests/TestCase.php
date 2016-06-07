<?php

namespace Amranidev\Lpackager\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return ['Amranidev\Lpackager\LpackagerServiceProvider'];
    }
}
