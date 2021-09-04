<?php
declare(strict_types=1);

namespace ZoidBoi\Laritio\SDK\Requests;

use ZoidBoi\Laritio\Enums\LaritioFileRequestAction;
use ZoidBoi\Laritio\SDK\Requests\Interfaces\LaritioSDKFileRequestInterface;

/**
 * Class LaritioSDKFileRequest
 *
 * @author Tyler Brennan < https://github.com/zoidboi >
 * @version 1.0
 */
class LaritioSDKFileRequest implements LaritioSDKFileRequestInterface
{
    /**
     * @var string
     */
    private $filePath;
    /**
     * @var array
     */
    private $arguments;
    /**
     * @var LaritioFileRequestAction|null
     */
    private $action;

    /**
     * @param string $filePath
     * @param array $arguments
     * @param LaritioFileRequestAction|null $action
     */
    public function __construct(string $filePath, array $arguments = [], LaritioFileRequestAction $action = null)
    {
        $this->filePath = $filePath;
        $this->arguments = $arguments;
        $this->action = $action;
    }

    /**
     * {@inheritDoc}
     */
    public function getFilePath(): string
    {
        return $this->filePath;
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
    public function getAction(): LaritioFileRequestAction
    {
        return $this->action ?? LaritioFileRequestAction::FILE();
    }
}
