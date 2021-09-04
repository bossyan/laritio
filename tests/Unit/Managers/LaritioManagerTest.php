<?php
declare(strict_types=1);

namespace ZoidBoi\Laritio\Tests\Unit\Managers;

use ZoidBoi\Laritio\Enums\LaritioHttpLibrary;
use ZoidBoi\Laritio\Managers\LaritioManager;
use ZoidBoi\Laritio\Tests\TestCase;


/**
 * Class LaritioManagerTest
 *
 * @author Tyler Brennan < https://github.com/zoidboi >
 * @version 1.0
 */
class LaritioManagerTest extends TestCase
{
    /**
     * @param string $publicKey
     * @param string $privateKey
     * @param LaritioHttpLibrary $library
     * @param string $endpoint
     * @param string $version
     *
     * @dataProvider provider
     */
    public function testSettingValuesOnLaritioManager(
        string             $publicKey,
        string             $privateKey,
        LaritioHttpLibrary $library,
        string             $endpoint,
        string             $version
    ): void
    {
        $manager = new LaritioManager($publicKey, $privateKey, $library, $endpoint, $version);

        self::assertSame($publicKey, $manager->getPublicKey());
        self::assertSame($privateKey, $manager->getPrivateKey());
        self::assertSame($library->getValue(), $manager->getLibrary()->getValue());
        self::assertSame($endpoint, $manager->getEndpoint());
        self::assertSame($version, $manager->getVersion());
    }

    public function provider(): array
    {
        return [
            ['TEST-KEY', 'TEST-PRIVATE-KEY', LaritioHttpLibrary::FOPEN(), 'https://api.publit.io/', '1'],
            ['TEST-KEY', 'TEST-PRIVATE-KEY', LaritioHttpLibrary::CURL(), 'https://api.publit.io/', '1'],
        ];
    }
}
