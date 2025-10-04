<?php

declare(strict_types=1);

namespace Domain\User\Exceptions;

use Exception;

final class TooLongUsername extends Exception
{
    public function __construct()
    {
        parent::__construct('Username cannot exceed 240 characters.');
    }
}
