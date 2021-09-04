<?php
declare(strict_types=1);

namespace ZoidBoi\Laritio\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class LaritioFileRequestAction
 *
 * @author Tyler Brennan < https://github.com/zoidboi >
 * @version 1.0
 */
class LaritioFileRequestAction extends Enum
{
    public const FILE = 'file';
    public const WATERMARK = 'watermark';
}
