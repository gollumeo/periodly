<?php

declare(strict_types=1);

namespace Domain\User\ValueObjects\UserAccount;

use Domain\User\Exceptions\UserAccount\Username\InvalidUsername;
use Domain\User\Exceptions\UserAccount\Username\TooLongUsername;

final readonly class Username
{
    public const int MAX_CHARS = 240;

    public function __construct(private string $value) {}

    public function __toString(): string
    {
        return $this->value;
    }

    public static function fromString(string $value): self
    {
        if ($value === '') {
            throw new InvalidUsername();
        }

        if (mb_strlen($value) > self::MAX_CHARS) {
            throw new TooLongUsername();
        }

        return new self($value);
    }

    public function value(): string
    {
        return $this->value;
    }
}
