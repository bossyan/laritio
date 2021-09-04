<?php
declare(strict_types=1);

namespace ZoidBoi\Laritio\Tests\Unit\SDK\Requests;

use ZoidBoi\Laritio\Enums\LaritioFileRequestAction;
use ZoidBoi\Laritio\SDK\Requests\LaritioSDKFileWatermarkRequest;
use ZoidBoi\Laritio\Tests\TestCase;

/**
 * Class LaritioSDKFileWatermarkRequestTest
 *
 * @author Tyler Brennan < https://github.com/zoidboi >
 * @version 1.0
 */
class LaritioSDKFileWatermarkRequestTest extends TestCase
{
    /**
     * @param string $filePath
     * @param array $arguments
     * @param LaritioFileRequestAction $action
     *
     * @dataProvider provider
     */
    public function testSettingValuesOnLaritioSdkFileWatermarkRequest(
        string                   $filePath,
        array                    $arguments,
        LaritioFileRequestAction $action
    ): void
    {
        $laritioSDKFileWatermarkRequest = new LaritioSDKFileWatermarkRequest($filePath, $arguments, $action);

        self::assertSame($filePath, $laritioSDKFileWatermarkRequest->getFilePath());
        self::assertSame($arguments, $laritioSDKFileWatermarkRequest->getArguments());
        self::assertSame($action->getValue(), $laritioSDKFileWatermarkRequest->getAction()->getValue());
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
                LaritioFileRequestAction::FILE()
            ],
            [
                '/another/path/to/my/file.extension',
                [],
                LaritioFileRequestAction::WATERMARK()
            ],
            [
                'different/path/to/my/file.extension',
                ['arg1' => 'value1', 'arg2' => 'value2'],
                LaritioFileRequestAction::FILE()
            ],
            [
                '/another/different/path/to/my/file.extension',
                ['arg1' => 'value1', 'arg2' => 'value2'],
                LaritioFileRequestAction::WATERMARK()
            ],
        ];
    }
}
