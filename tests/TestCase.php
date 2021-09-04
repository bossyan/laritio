<?php
declare(strict_types=1);

namespace ZoidBoi\Laritio\Tests;

use Illuminate\Foundation\Providers\FoundationServiceProvider;

/**
 * Class TestCase
 *
 * @author Tyler Brennan < https://github.com/zoidboi >
 * @version 1.0
 */
class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            FoundationServiceProvider::class
        ];
    }
}
