<?php

declare(strict_types=1);

namespace Domain\User\Exceptions\UserAccount\UserEmail;

use Exception;

final class InvalidUserEmailFormat extends Exception
{
    public function __construct()
    {
        parent::__construct('The email address format is invalid.');
    }
}
