<?php

declare(strict_types=1);

namespace Domain\User\Exceptions\UserAccount\Username;

use Exception;

final class InvalidUsername extends Exception
{
    public function __construct()
    {
        parent::__construct('Invalid username.');
    }
}
