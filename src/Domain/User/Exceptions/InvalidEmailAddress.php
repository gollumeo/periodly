<?php

declare(strict_types=1);

namespace Domain\User\Exceptions;

use Exception;

final class InvalidEmailAddress extends Exception
{
    public function __construct()
    {
        parent::__construct('Email address cannot be empty.');
    }
}
