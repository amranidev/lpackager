<?php

namespace Amranidev\Lpackager\Tests;

class TestCase extends Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return ['Amranidev\Lpackager\LpackagerServiceProvider'];
    }
}