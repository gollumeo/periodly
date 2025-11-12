<?php

declare(strict_types=1);

use Domain\User\Exceptions\UserAccount\UserPassword\InvalidCharsetUserPassword;
use Domain\User\Exceptions\UserAccount\UserPassword\InvalidUserPassword;
use Domain\User\Exceptions\UserAccount\UserPassword\TooShortUserPassword;
use Domain\User\ValueObjects\UserAccount\PlainPassword;

describe('Unit: Plain Password', function (): void {
    it('cannot be empty', function (): void {
        expect(
            fn () => new PlainPassword('')
        )->toThrow(InvalidUserPassword::class)
            ->and(
                // @phpstan-ignore-next-line
                fn () => new PlainPassword(null)
            )->toThrow(TypeError::class);
    });

    it('must be at least 6 characters', function (): void {
        expect(
            fn () => new PlainPassword('123')
        )->toThrow(TooShortUserPassword::class);
    });

    it('must respect a specific charset', function (string $password): void {
        expect(
            fn () => new PlainPassword($password)
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
            fn () => new PlainPassword('MySuperPassword1!')
        )->not->toThrow(Throwable::class);
    });
});
