<?php

declare(strict_types=1);

namespace Tests\Fakes\Framework;

use Domain\Shared\ValueObjects\StringValueObject;
use InvalidArgumentException;

final class FakeStringVO extends StringValueObject
{
    protected static function validate(string $value): void
    {
        if ($value === '') {
            throw new InvalidArgumentException();
        }
    }
}
