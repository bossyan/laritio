<?php
declare(strict_types=1);

namespace ZoidBoi\Laritio\SDK\Requests;

use ZoidBoi\Laritio\Enums\LaritioRequestType;
use ZoidBoi\Laritio\SDK\Requests\Interfaces\LaritioSDKRequestInterface;

/**
 * Class LaritioSDKRequest
 *
 * @author Tyler Brennan < https://github.com/zoidboi >
 * @version 1.0
 */
class LaritioSDKRequest implements LaritioSDKRequestInterface
{
    /**
     * @var string
     */
    private $endpoint;
    /**
     * @var array
     */
    private $arguments;
    /**
     * @var LaritioRequestType|null
     */
    private $httpMethod;

    /**
     * @param string $endpoint
     * @param array $arguments
     * @param LaritioRequestType|null $httpMethod
     */
    public function __construct(string $endpoint, array $arguments = [], LaritioRequestType $httpMethod = null)
    {
        $this->endpoint = $endpoint;
        $this->arguments = $arguments;
        $this->httpMethod = $httpMethod;
    }

    /**
     * {@inheritDoc}
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * {@inheritDoc}
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    /**
     * {@inheritDoc}
     */
    public function getHttpMethod(): LaritioRequestType
    {
        return $this->httpMethod ?? LaritioRequestType::TYPE_GET();
    }
}
