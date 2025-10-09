<?php

declare(strict_types=1);

use Domain\User\Exceptions\UserAccount\UserEmail\InvalidUserEmail;
use Domain\User\Exceptions\UserAccount\UserEmail\InvalidUserEmailCharset;
use Domain\User\ValueObjects\UserAccount\UserEmail;

describe('Unit: User Email', function (): void {
    it('cannot be empty', function (string $userEmail): void {
        expect(
            fn () => new UserEmail($userEmail)
        )->toThrow(InvalidUserEmail::class)
            ->and(
                // @phpstan-ignore-next-line
                fn () => new UserEmail(null)
            )->toThrow(TypeError::class);
    })->with(['', ' ']);

    it('must be a valid email format', function (): void {
        expect(
            fn () => new UserEmail('email')
        )->toThrow(InvalidUserEmailCharset::class);
    });

    it('accepts a valid email address', function (string $userEmail): void {
        expect(
            /**
             * @throws InvalidUserEmail
             * @throws InvalidUserEmailCharset
             */
            fn () => new UserEmail($userEmail)
        )->not->toThrow(Throwable::class);
    })->with([
        'janedoe@periodly.be',
        'jane_doe@email.com',
        'iHate@myPeriods.io',
        'sick.for.a@week.xyz',
        'lol-periodAccount@bwipo.ass',
    ]);

    it('is not case sensitive', function (): void {
        $firstEmail = new UserEmail('ThisIsA@test.com');
        $secondEmail = new UserEmail('thisisa@test.com');

        expect($firstEmail)->toEqual($secondEmail);
    });
});
