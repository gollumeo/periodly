<?php

declare(strict_types=1);

describe('Unit: User Email', function (): void {
    it('cannot be empty', function (): void {
        expect(
            fn () => new UserEmail('')
        )->toThrow(InvalidUserEmail::class);
    });
});
