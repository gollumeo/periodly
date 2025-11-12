<?php

declare(strict_types=1);

namespace Infrastructure\Uuid;

use Application\Contracts\Shared\UuidContract;
use Domain\User\Exceptions\InvalidUserId;
use Ramsey\Uuid\Uuid;

final class RamseyUuidV4 implements UuidContract
{
    public function generate(): string
    {
        return Uuid::uuid4()->toString();
    }

    /**
     * @throws InvalidUserId
     */
    public function ensure(string $value): void
    {
        if (! Uuid::isValid($value)) {
            throw new InvalidUserId($value);
        }
    }
}
