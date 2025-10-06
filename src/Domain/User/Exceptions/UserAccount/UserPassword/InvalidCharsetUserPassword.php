<?php

declare(strict_types=1);

namespace Domain\User\Exceptions\UserAccount\UserPassword;

use Exception;

final class InvalidCharsetUserPassword extends Exception
{
    public function __construct()
    {
        parent::__construct('Password must contain at least one uppercase letter, one lowercase letter, one number and a special character.');
    }
}
