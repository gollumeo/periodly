<?php

declare(strict_types=1);

namespace Tests\Fakes;

use Application\Contracts\Shared\UserRepositoryContract;
use Domain\User\ValueObjects\UserAccount\UserEmail;

final class InMemoryUsers implements UserRepositoryContract
{
    /** @var int[] */
    private array $users;

    public function findById(int $userId): ?int
    {
        return $this->users[$userId] ?? null;
    }

    public function findByEmail(UserEmail $email): ?int
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

    public function add(): void
    {
        // TODO: Implement add() method.
    }
}
