<?php

declare(strict_types=1);

namespace Domain\User\ValueObjects\UserAccount;

use Domain\User\Exceptions\UserAccount\UserPassword\InvalidCharsetUserPassword;
use Domain\User\Exceptions\UserAccount\UserPassword\InvalidUserPassword;
use Domain\User\Exceptions\UserAccount\UserPassword\TooShortUserPassword;

final readonly class PlainPassword
{
    /**
     * @throws InvalidUserPassword
     * @throws TooShortUserPassword|InvalidCharsetUserPassword
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
