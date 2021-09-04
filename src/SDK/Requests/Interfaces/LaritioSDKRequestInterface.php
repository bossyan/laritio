<?php
declare(strict_types=1);

namespace ZoidBoi\Laritio\SDK\Requests\Interfaces;

use ZoidBoi\Laritio\Enums\LaritioRequestType;

/**
 * Interface LaritioSDKRequestInterface
 *
 * @author Tyler Brennan < https://github.com/zoidboi >
 * @version 1.0
 */
interface LaritioSDKRequestInterface
{
    /**
     * Should return the endpoint to which the
     * SDK points the request.
     *
     * @return string
     * @example /files/create
     *
     */
    public function getEndpoint(): string;

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
     * Should return a LaritioRequestType object.
     *
     * @return LaritioRequestType
     * @example LaritioRequestType::TYPE_GET()
     *
     */
    public function getHttpMethod(): LaritioRequestType;
}
