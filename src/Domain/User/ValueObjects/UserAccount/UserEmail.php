<?php

declare(strict_types=1);

namespace Domain\User\ValueObjects\UserAccount;

use Domain\User\Exceptions\UserAccount\UserEmail\InvalidUserEmail;
use Domain\User\Exceptions\UserAccount\UserEmail\InvalidUserEmailFormat;

final readonly class UserEmail
{
    public function __construct(private string $value) {}

    public function __toString(): string
    {
        return $this->value;
    }

    /**
     * @throws InvalidUserEmail
     * @throws InvalidUserEmailFormat
     */
    public static function fromString(string $value): self
    {
        if (mb_trim($value) === '') {
            throw new InvalidUserEmail();
        }

        if (! preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i', $value)) {
            throw new InvalidUserEmailFormat();
        }

        return new self(mb_strtolower($value));
    }

    public function value(): string
    {
        return $this->value;
    }
}
