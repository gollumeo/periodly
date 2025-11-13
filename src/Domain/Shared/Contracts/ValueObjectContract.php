<?php

declare(strict_types=1);

namespace Domain\Shared\Contracts;

interface ValueObjectContract
{
    public function equals(self $other): bool;

    public function value(): mixed;
}
