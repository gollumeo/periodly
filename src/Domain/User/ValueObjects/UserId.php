<?php

declare(strict_types=1);

namespace Domain\User\ValueObjects;

use Application\Contracts\Shared\UuidContract;

final readonly class UserId
{
    private function __construct(
        private string $value,
    ) {}

    public static function generate(UuidContract $uuid): self
    {
        return new self(
            $uuid->generate()
        );
    }

    public static function fromString(string $id, UuidContract $uuid): self
    {
        $uuid->ensure($id);

        return new self($id);
    }

    public function value(): string
    {
        return $this->value;
    }
}
