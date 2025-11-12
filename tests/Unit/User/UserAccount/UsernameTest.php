<?php

declare(strict_types=1);

use Domain\User\Exceptions\UserAccount\Username\InvalidUsername;
use Domain\User\Exceptions\UserAccount\Username\TooLongUsername;
use Domain\User\ValueObjects\UserAccount\Username;

describe('Unit: Username', function (): void {
    it('cannot be empty', function (): void {
        expect(
            fn () => Username::fromString('')
        )->toThrow(InvalidUsername::class)
            ->and(
                // @phpstan-ignore-next-line
                fn () => Username::fromString(null)
            )->toThrow(TypeError::class);

    });

    it('cannot exceed 240 chars', function (): void {
        expect(
            fn () => Username::fromString(str_repeat('a', 241))
        )->toThrow(TooLongUsername::class);
    });

    it('accepts a valid length', function (): void {
        expect(
            fn () => Username::fromString(str_repeat('a', 15))
        )->not->toThrow(Throwable::class);
    });
});
