<?php
declare(strict_types=1);

namespace ZoidBoi\Laritio\Tests\Unit\SDK\Requests;

use ZoidBoi\Laritio\Enums\LaritioRequestType;
use ZoidBoi\Laritio\SDK\Requests\LaritioSDKRequest;
use ZoidBoi\Laritio\Tests\TestCase;

/**
 * Class LaritioSDKRequestTest
 *
 * @author Tyler Brennan < https://github.com/zoidboi >
 * @version 1.0
 */
class LaritioSDKRequestTest extends TestCase
{
    /**
     * @param string $endpoint
     * @param array $arguments
     * @param LaritioRequestType $httpMethod
     *
     * @dataProvider provider
     */
    public function testSettingValuesOnLaritioSdkRequest(
        string             $endpoint,
        array              $arguments,
        LaritioRequestType $httpMethod
    ): void
    {
        $laritioSDKFileRequest = new LaritioSDKRequest($endpoint, $arguments, $httpMethod);

        self::assertSame($endpoint, $laritioSDKFileRequest->getEndpoint());
        self::assertSame($arguments, $laritioSDKFileRequest->getArguments());
        self::assertSame($httpMethod->getValue(), $laritioSDKFileRequest->getHttpMethod()->getValue());
    }

    /**
     * @return array[]
     */
    public function provider(): array
    {
        return [
            [
                '/path/to/my/file.extension',
                [],
                LaritioRequestType::TYPE_GET()
            ],
            [
                '/another/path/to/my/file.extension',
                [],
                LaritioRequestType::TYPE_POST()
            ],
            [
                'different/path/to/my/file.extension',
                ['arg1' => 'value1', 'arg2' => 'value2'],
                LaritioRequestType::TYPE_PATCH()
            ],
            [
                '/another/different/path/to/my/file.extension',
                ['arg1' => 'value1', 'arg2' => 'value2'],
                LaritioRequestType::TYPE_PUT()
            ],
            [
                'yet/another/different/path/to/my/file.extension',
                ['arg1' => 'value1', 'arg2' => 'value2'],
                LaritioRequestType::TYPE_DELETE()
            ],
        ];
    }
}
