<?php

declare(strict_types=1);

namespace Tests\Fakes;

use Application\Contracts\Shared\UserRepositoryContract;
use Domain\User\ValueObjects\UserAccount\UserEmail;

final class InMemoryUsers implements UserRepositoryContract
{
    public function findById(int $userId)
    {
        // TODO: Implement findById() method.
    }

    public function findByEmail(UserEmail $email)
    {
        // TODO: Implement findByEmail() method.
    }

    /**
     * {@inheritDoc}
     */
    public function all(): array
    {
        // TODO: Implement all() method.
    }
}
