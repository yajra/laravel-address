<?php

namespace Yajra\Address\Tests;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Yajra\Address\AddressServiceProvider;

abstract class TestCase extends BaseTestCase
{
    use LazilyRefreshDatabase;

    protected function getPackageProviders($app): array
    {
        return [
            AddressServiceProvider::class,
        ];
    }
}
