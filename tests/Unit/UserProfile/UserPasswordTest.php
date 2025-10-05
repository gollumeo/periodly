<?php

declare(strict_types=1);

use Domain\User\Exceptions\InvalidUserPassword;
use Domain\User\ValueObjects\UserPassword;

describe('Unit: Password', function (): void {
    it('cannot be empty', function (): void {
        expect(
            fn () => new UserPassword('')
        )->toThrow(InvalidUserPassword::class)
            ->and(
                // @phpstan-ignore-next-line
                fn () => new UserPassword(null)
            )->toThrow(TypeError::class);
    });
});
