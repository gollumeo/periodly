<?php

declare(strict_types=1);

namespace Tests\Fakes;

use Application\Contracts\Shared\UuidContract;
use Domain\User\Exceptions\InvalidUserId;

final readonly class FakeUuid implements UuidContract
{
    public function __construct(
        private string $fixedValue = '123e4567-e89b-12d3-a456-426614174000',
    ) {}

    public function generate(): string
    {
        return $this->fixedValue;
    }

    /**
     * @throws InvalidUserId
     */
    public function ensure(string $value): void
    {
        if ($value !== $this->fixedValue) {
            throw new InvalidUserId($value);
        }
    }
}
