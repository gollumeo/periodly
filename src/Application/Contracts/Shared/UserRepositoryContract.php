<?php

declare(strict_types=1);

namespace Application\Contracts\Shared;

use Domain\User\ValueObjects\UserAccount\UserEmail;

interface UserRepositoryContract
{
    public function findById(int $userId);

    public function findByEmail(UserEmail $email);

    /**
     * @return array<int>
     */
    public function all(): array;
}
