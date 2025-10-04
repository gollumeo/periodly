<?php

declare(strict_types=1);

namespace Domain\User\ValueObjects;

use Domain\User\Exceptions\InvalidUsername;

final readonly class Username
{
    /**
     * @throws InvalidUsername
     */
    public function __construct(private string $username)
    {
        if ($this->username === '') {
            throw new InvalidUsername();
        }
    }
}
