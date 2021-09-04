<?php
declare(strict_types=1);

namespace ZoidBoi\Laritio\Managers;

use ZoidBoi\Laritio\Enums\LaritioHttpLibrary;

/**
 * Class LaritioManager
 *
 * @author Tyler Brennan < https://github.com/zoidboi >
 * @version 1.0
 */
final class LaritioManager
{
    /**
     * @var string
     */
    private $publicKey;
    /**
     * @var string
     */
    private $privateKey;
    /**
     * @var LaritioHttpLibrary
     */
    private $library;
    /**
     * @var string
     */
    private $endpoint;
    /**
     * @var string
     */
    private $version;

    /**
     * @param string $publicKey
     * @param string $privateKey
     * @param LaritioHttpLibrary $library
     * @param string $endpoint
     * @param string $version
     */
    public function __construct(
        string             $publicKey,
        string             $privateKey,
        LaritioHttpLibrary $library,
        string             $endpoint,
        string             $version
    )
    {
        $this->publicKey = $publicKey;
        $this->privateKey = $privateKey;
        $this->library = $library;
        $this->endpoint = $endpoint;
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    /**
     * @return string
     */
    public function getPrivateKey(): string
    {
        return $this->privateKey;
    }

    /**
     * @return LaritioHttpLibrary
     */
    public function getLibrary(): LaritioHttpLibrary
    {
        return $this->library;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }
}
