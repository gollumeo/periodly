<?php

declare(strict_types=1);

use Domain\User\Exceptions\UserAccount\UserEmail\InvalidUserEmail;
use Domain\User\ValueObjects\UserAccount\UserEmail;

describe('Unit: User Email', function (): void {
    it('cannot be empty', function (): void {
        expect(
            fn () => new UserEmail('')
        )->toThrow(InvalidUserEmail::class)
            ->and(
                // @phpstan-ignore-next-line
                fn () => new UserEmail(null)
            )->toThrow(TypeError::class);
    });
});
