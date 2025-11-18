<?php

declare(strict_types=1);

namespace Domain\User\ValueObjects;

use Domain\User\Exceptions\InvalidEmailAddress;

final class EmailAddress
{
    private function __construct(private string $value) {}

    public function __toString(): string
    {
        return $this->value;
    }

    public static function fromString(string $value): self
    {
        $trimmedValue = mb_trim($value);

        if ($trimmedValue === '') {
            throw new InvalidEmailAddress();
        }

        return new self($trimmedValue);
    }

    public function equals(self $other): bool
    {
        return $this->value() === $other->value();
    }

    public function value(): string
    {
        return $this->value;
    }
}
