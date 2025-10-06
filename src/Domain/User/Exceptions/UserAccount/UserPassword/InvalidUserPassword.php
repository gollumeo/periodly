<?php

declare(strict_types=1);

namespace Domain\User\Exceptions\UserAccount\UserPassword;

use Exception;

final class InvalidUserPassword extends Exception
{
    public function __construct()
    {
        parent::__construct('Password cannot be empty.');
    }
}
