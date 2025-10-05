<?php

declare(strict_types=1);

namespace Domain\User\ValueObjects;

use Domain\User\Exceptions\InvalidUserPassword;

final readonly class UserPassword
{
    /**
     * @throws InvalidUserPassword
     */
    public function __construct(private string $password)
    {
        if ($this->password === '') {
            throw new InvalidUserPassword();
        }
    }
}
