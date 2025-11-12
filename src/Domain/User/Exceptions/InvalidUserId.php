<?php

declare(strict_types=1);

namespace Domain\User\Exceptions;

use Exception;

final class InvalidUserId extends Exception
{
    public function __construct(string $value)
    {
        parent::__construct("Invalid userId: {$value}");
    }
}
