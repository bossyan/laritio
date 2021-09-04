<?php
declare(strict_types=1);

namespace ZoidBoi\Laritio\Providers;

use Illuminate\Config\Repository;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use ZoidBoi\Laritio\Enums\LaritioHttpLibrary;
use ZoidBoi\Laritio\Managers\LaritioManager;

/**
 * Class LaritioServiceProvider
 *
 * @author Tyler Brennan < https://github.com/zoidboi >
 * @version 1.0
 */
class LaritioServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes(
            [
                __DIR__ . '/../Config/laritio.php' => config_path('laritio.php')
            ]
        );
    }

    public function register(): void
    {
        $this->app->singleton(
            LaritioManager::class,
            function (Application $application) {
                /** @var Repository $configRepository */
                $configRepository = $application->make(Repository::class);

                return new LaritioManager(
                    $configRepository->get('laritio.public_key'),
                    $configRepository->get('laritio.private_key'),
                    new LaritioHttpLibrary(
                        $configRepository->get('laritio.http_library')
                    ),
                    $configRepository->get('laritio.api_endpoint'),
                    $configRepository->get('laritio.api_version'),
                );
            }
        );
    }
}
