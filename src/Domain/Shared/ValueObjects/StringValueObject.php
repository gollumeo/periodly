<?php

declare(strict_types=1);

namespace Domain\Shared\ValueObjects;

use Domain\Shared\Contracts\ValueObjectContract;

abstract class StringValueObject implements ValueObjectContract
{
    private function __construct(private readonly string $value) {}

    final public function __toString(): string
    {
        return $this->value;
    }

    abstract protected static function validate(string $value): void;

    final public static function fromString(string $value): static
    {
        static::validate($value);

        return new static($value);
    }

    final public function equals(ValueObjectContract $other): bool
    {
        return $this->value === $other->value();
    }

    final public function value(): string
    {
        return $this->value;
    }
}
