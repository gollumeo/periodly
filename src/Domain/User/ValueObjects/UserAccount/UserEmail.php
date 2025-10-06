<?php

declare(strict_types=1);

namespace Domain\User\ValueObjects\UserAccount;

use Domain\User\Exceptions\UserAccount\UserEmail\InvalidUserEmail;

final class UserEmail
{
    /**
     * @throws InvalidUserEmail
     */
    public function __construct(string $userEmail)
    {
        if ($userEmail === '') {
            throw new InvalidUserEmail();
        }
    }
}
