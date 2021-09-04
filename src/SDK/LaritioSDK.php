<?php
declare(strict_types=1);

namespace ZoidBoi\Laritio\SDK;

use CURLFile;
use Exception;
use http\Exception\UnexpectedValueException;
use ZoidBoi\Laritio\Enums\LaritioFileRequestAction;
use ZoidBoi\Laritio\Enums\LaritioHttpLibrary;
use ZoidBoi\Laritio\Enums\LaritioRequestType;
use ZoidBoi\Laritio\Managers\LaritioManager;
use ZoidBoi\Laritio\SDK\Requests\Interfaces\LaritioSDKFileRequestInterface;
use ZoidBoi\Laritio\SDK\Requests\Interfaces\LaritioSDKRequestInterface;

/**
 * Class LaritioSDK
 *
 * @author Tyler Brennan < https://github.com/zoidboi >
 * @version 1.0
 */
class LaritioSDK
{
    /**
     * @var LaritioManager
     */
    private $laritioManager;

    /**
     * @param LaritioManager $laritioManager
     */
    public function __construct(LaritioManager $laritioManager)
    {
        $this->laritioManager = $laritioManager;
    }

    /**
     * Execute API call.
     *
     * @param LaritioSDKRequestInterface $SDKRequest
     * @return bool|string
     * @throws Exception
     * @throws UnexpectedValueException
     */
    public function call(LaritioSDKRequestInterface $SDKRequest)
    {
        $fullUrl = $this->buildUrl($SDKRequest->getEndpoint(), $SDKRequest->getArguments());

        if ($this->laritioManager->getLibrary() === LaritioHttpLibrary::CURL()) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $SDKRequest->getHttpMethod()->getValue());
            curl_setopt($curl, CURLOPT_URL, $fullUrl);

            $response = curl_exec($curl);
            curl_close($curl);
        } elseif ($SDKRequest->getHttpMethod() === LaritioRequestType::TYPE_GET()) {
            $response = file_get_contents($fullUrl);
        } else {
            throw new UnexpectedValueException('Given http library is not supported at this time.');
        }

        return @unserialize($response) ?? $response;
    }

    /**
     * @param string $endpoint
     * @param array $arguments
     * @return string
     * @throws Exception
     */
    private function buildUrl(string $endpoint, array $arguments = []): string
    {
        return $this->laritioManager->getEndpoint()
            . DIRECTORY_SEPARATOR
            . 'v'
            . $this->laritioManager->getVersion()
            . $endpoint
            . '?'
            . http_build_query($this->buildArguments($arguments));
    }

    /**
     * @param array $arguments
     * @return array
     * @throws Exception
     */
    private function buildArguments(array $arguments): array
    {
        $arguments['api_nonce'] = str_pad(
            (string)random_int(0, 999999999),
            8,
            '',
            STR_PAD_LEFT
        );
        $arguments['api_timestamp'] = time();
        $arguments['api_key'] = $this->laritioManager->getPublicKey();

        if (!array_key_exists('api_format', $arguments)) {
            // Use the serialised PHP format,
            // otherwise use format specified in the call() arguments.
            $arguments['api_format'] = 'php';
        }

        $arguments['api_kit'] = 'php-' . $this->laritioManager->getVersion();
        $arguments['api_signature'] = sha1(
            $arguments['api_timestamp']
            . $arguments['api_nonce']
            . $this->laritioManager->getPrivateKey()
        );

        return $arguments;
    }

    /**
     * @param LaritioSDKFileRequestInterface $SDKFileRequest
     * @return string
     * @throws Exception
     * @throws UnexpectedValueException
     */
    public function uploadFile(LaritioSDKFileRequestInterface $SDKFileRequest): string
    {
        $fullUrl = $this->buildUrl('/files/create', $SDKFileRequest->getArguments());
        if ($SDKFileRequest->getAction() === LaritioFileRequestAction::WATERMARK()) {
            $fullUrl = $this->buildUrl('/watermarks/create', $SDKFileRequest->getArguments());
        }

        $postData = ['file' => new CURLFile($SDKFileRequest->getFilePath())];
        if ($this->laritioManager->getLibrary() === LaritioHttpLibrary::CURL()) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_URL, $fullUrl);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);

            $response = curl_exec($curl);
            $errNo = curl_errno($curl);
            $errMsg = curl_error($curl);
            curl_close($curl);
        } else {
            throw new UnexpectedValueException('Given HTTP library is not supported at this time. Only CURL is supported.');
        }

        if ($errNo > 0) {
            throw new Exception('Error #' . $errNo . ': ' . ($errMsg ?? ''));
        }

        return $response;
    }
}
