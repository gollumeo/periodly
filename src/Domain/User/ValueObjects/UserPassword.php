<?php

declare(strict_types=1);

namespace Domain\User\ValueObjects;

use Domain\User\Exceptions\InvalidCharsetUserPassword;
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

        if (! preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^A-Za-z\d]).+$/', $this->password)) {
            throw new InvalidCharsetUserPassword();
        }
    }
}
