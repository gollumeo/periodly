<?php

declare(strict_types=1);

namespace Application\Contracts\Shared;

interface UuidContract
{
    public function generate(): string;

    public function ensure(string $value): void;
}
