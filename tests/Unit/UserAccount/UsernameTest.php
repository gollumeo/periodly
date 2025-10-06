<?php

declare(strict_types=1);

use Domain\User\Exceptions\UserAccount\Username\InvalidUsername;
use Domain\User\Exceptions\UserAccount\Username\TooLongUsername;
use Domain\User\ValueObjects\UserAccount\Username;

describe('Unit: Username', function (): void {
    it('cannot be empty', function (): void {
        expect(
            fn () => new Username('')
        )->toThrow(InvalidUsername::class)
            ->and(
                // @phpstan-ignore-next-line
                fn () => new Username(null)
            )->toThrow(TypeError::class);

    });

    it('cannot exceed 240 chars', function (): void {
        expect(
            /**
             * @throws InvalidUsername
             * @throws TooLongUsername
             */
            fn () => new Username(str_repeat('a', 241))
        )->toThrow(TooLongUsername::class);
    });

    it('accepts a valid length', function (): void {
        expect(
            /**
             * @throws InvalidUsername
             * @throws TooLongUsername
             */
            fn () => new Username(str_repeat('a', 15))
        )->not->toThrow(Throwable::class);
    });
});
