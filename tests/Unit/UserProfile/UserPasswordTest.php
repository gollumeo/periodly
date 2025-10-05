<?php

declare(strict_types=1);

use Domain\User\Exceptions\InvalidCharsetUserPassword;
use Domain\User\Exceptions\InvalidUserPassword;
use Domain\User\Exceptions\TooShortUserPassword;
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

    it('must be at least 6 characters', function (): void {
        expect(
            fn () => new UserPassword('123')
        )->toThrow(TooShortUserPassword::class);
    });

    it('must respect a specific charset', function (string $password): void {
        expect(
            /**
             * @throws TooShortUserPassword
             * @throws InvalidUserPassword
             */
            fn () => new UserPassword($password)
        )->toThrow(InvalidCharsetUserPassword::class);
    })->with([
        'password123.',
        'PASSWORD123.',
        'Password.',
        'Password123',
        'password',
    ]);

    it('accepts a valid password', function (): void {
        expect(
            fn () => new UserPassword('MySuperPassword1!')
        )->not->toThrow(Throwable::class);
    });
});
