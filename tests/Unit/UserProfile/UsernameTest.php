<?php

declare(strict_types=1);

use Domain\User\Exceptions\InvalidUsername;
use Domain\User\ValueObjects\Username;

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
        expect(fn () => new Username(str_repeat('a', 241)))->toThrow(TooLongUsername::class);
    });

    it('can be created with a valid length', function (): void {
        expect(fn () => new Username(str_repeat('a', 15)))->not->toThrow(Throwable::class);
    });
});
