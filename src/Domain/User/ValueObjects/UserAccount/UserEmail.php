<?php

declare(strict_types=1);

namespace Domain\User\ValueObjects\UserAccount;

use Domain\User\Exceptions\UserAccount\UserEmail\InvalidUserEmail;
use Domain\User\Exceptions\UserAccount\UserEmail\InvalidUserEmailFormat;

final class UserEmail
{
    /**
     * @throws InvalidUserEmail|InvalidUserEmailFormat
     */
    public function __construct(private string $userEmail)
    {
        if (mb_trim($userEmail) === '') {
            throw new InvalidUserEmail();
        }

        if (! preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i', $userEmail)) {
            throw new InvalidUserEmailFormat();
        }

        $this->userEmail = mb_strtolower($userEmail);
    }
}
