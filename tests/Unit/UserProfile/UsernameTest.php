<?php

declare(strict_types=1);

describe('Unit: Username', function (): void {
    it('cannot be empty', function (?string $username): void {
        expect(fn () => new Username($username))->toThrow(InvalidUsername::class);
    })->with(['', null]);

    it('cannot exceed 240 chars', function (): void {
        expect(fn () => new Username(str_repeat('a', 241)))->toThrow(TooLongUsername::class);
    });

    it('can be created with a valid length', function (): void {
        expect(fn () => new Username(str_repeat('a', 15)))->not->toThrow(Throwable::class);
    });
});
