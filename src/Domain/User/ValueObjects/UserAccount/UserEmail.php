<?php

declare(strict_types=1);

namespace Domain\User\ValueObjects\UserAccount;

use Domain\User\Exceptions\UserAccount\UserEmail\InvalidUserEmail;
use Domain\User\Exceptions\UserAccount\UserEmail\InvalidUserEmailCharset;

final class UserEmail
{
    /**
     * @throws InvalidUserEmail|InvalidUserEmailCharset
     */
    public function __construct(string $userEmail)
    {
        if ($userEmail === '') {
            throw new InvalidUserEmail();
        }

        if (! preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i', $userEmail)) {
            throw new InvalidUserEmailCharset();
        }
    }
}
