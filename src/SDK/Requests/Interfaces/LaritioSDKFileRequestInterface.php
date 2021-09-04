<?php
declare(strict_types=1);

namespace ZoidBoi\Laritio\SDK\Requests\Interfaces;

use ZoidBoi\Laritio\Enums\LaritioFileRequestAction;

/**
 * Interface LaritioSDKFileRequestInterface
 *
 * @author Tyler Brennan < https://github.com/zoidboi >
 * @version 1.0
 */
interface LaritioSDKFileRequestInterface
{
    /**
     * Should return the path towards the
     * file on your machine that the SDK should upload
     * to the publit.io API.
     *
     * @return string
     * @example /path/to/my/file.extension
     *
     */
    public function getFilePath(): string;

    /**
     * Should return an array of arguments
     * that the SDK should include in the API request.
     *
     * @return array
     * @example ['arg1' => 'value1', 'arg2' => 'value2']
     *
     */
    public function getArguments(): array;

    /**
     * Should return a LaritioFileRequestAction enum object.
     *
     * @return LaritioFileRequestAction
     * @example LaritioFileRequestAction::FILE()
     *
     */
    public function getAction(): LaritioFileRequestAction;
}
