<?php

declare(strict_types=1);

namespace Domain\User\Exceptions\UserAccount\UserEmail;

use Exception;

final class InvalidUserEmail extends Exception
{
    public function __construct()
    {
        parent::__construct('Email address cannot be empty.');
    }
}
