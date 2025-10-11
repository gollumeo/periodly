<?php

declare(strict_types=1);

namespace Domain\User\ValueObjects\UserAccount;

use Domain\User\Exceptions\UserAccount\UserPassword\InvalidCharsetUserPassword;
use Domain\User\Exceptions\UserAccount\UserPassword\InvalidUserPassword;
use Domain\User\Exceptions\UserAccount\UserPassword\TooShortUserPassword;

final class PlainPassword
{
    private const string PATTERN = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^A-Za-z\d]).+$/';

    private const int MIN_LENGTH = 8;

    /**
     * @throws InvalidCharsetUserPassword
     * @throws TooShortUserPassword
     * @throws InvalidUserPassword
     */
    public function __construct(private string $password)
    {
        $trimmedPassword = mb_trim($this->password);
        if ($trimmedPassword === '') {
            throw new InvalidUserPassword();
        }

        if (mb_strlen($this->password) < self::MIN_LENGTH) {
            throw new TooShortUserPassword();
        }

        if (! preg_match(self::PATTERN, $this->password)) {
            throw new InvalidCharsetUserPassword();
        }

        $this->password = $trimmedPassword;
    }
}
