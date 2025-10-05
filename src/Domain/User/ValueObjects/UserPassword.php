<?php

declare(strict_types=1);

namespace Domain\User\ValueObjects;

use Domain\User\Exceptions\InvalidUserPassword;
use Domain\User\Exceptions\TooShortUserPassword;

final readonly class UserPassword
{
    /**
     * @throws InvalidUserPassword
     * @throws TooShortUserPassword
     */
    public function __construct(private string $password)
    {
        if ($this->password === '') {
            throw new InvalidUserPassword();
        }

        if (mb_strlen($this->password) < 6) {
            throw new TooShortUserPassword();
        }
    }
}
