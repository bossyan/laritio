<?php
declare(strict_types=1);

namespace ZoidBoi\Laritio\Enums;

use MyCLabs\Enum\Enum;

class LaritioRequestType extends Enum
{
    public const TYPE_GET = 'GET';
    public const TYPE_POST = 'POST';
    public const TYPE_PUT = 'PUT';
    public const TYPE_PATCH = 'PATCH';
    public const TYPE_DELETE = 'DELETE';
}
