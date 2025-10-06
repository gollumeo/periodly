<?php

declare(strict_types=1);

namespace Domain\User\ValueObjects\UserAccount;

use Domain\User\Exceptions\UserAccount\Username\InvalidUsername;
use Domain\User\Exceptions\UserAccount\Username\TooLongUsername;

final readonly class Username
{
    /**
     * @throws InvalidUsername|TooLongUsername
     */
    public function __construct(private string $username)
    {
        if ($this->username === '') {
            throw new InvalidUsername();
        }

        if (mb_strlen($this->username) > 240) {
            throw new TooLongUsername();
        }
    }
}
