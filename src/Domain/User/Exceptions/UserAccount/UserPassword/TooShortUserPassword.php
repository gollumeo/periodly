<?php

declare(strict_types=1);

namespace Domain\User\Exceptions\UserAccount\UserPassword;

use Exception;

final class TooShortUserPassword extends Exception
{
    public function __construct()
    {
        parent::__construct('Password must be at least 6 characters.');
    }
}
