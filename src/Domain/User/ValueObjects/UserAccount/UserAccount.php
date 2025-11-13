<?php

declare(strict_types=1);

namespace Domain\User\ValueObjects\UserAccount;

final readonly class UserAccount
{
    public function __construct(
        private UserEmail $email,
        private Username $username,
        private PlainPassword $plainPassword,
    ) {}

    public function email(): string
    {
        return $this->email->value();
    }

    public function username(): string
    {
        return $this->username->value();
    }

    public function plainPassword(): string
    {
        return $this->plainPassword->value();
    }
}
