<?php
declare(strict_types=1);

namespace ZoidBoi\Laritio\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class LaritioHttpLibrary
 *
 * @author Tyler Brennan < https://github.com/zoidboi >
 * @version 1.0
 */
class LaritioHttpLibrary extends Enum
{
    public const CURL = 'curl';
    public const FOPEN = 'fopen';
}
