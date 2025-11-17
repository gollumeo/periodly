<?php

declare(strict_types=1);

describe('Domain: Account Email Address', function (): void {
    it('cannot be empty or only whitespace', function (string $rawEmail): void {
        expect(fn () => EmailAddress::fromString($rawEmail))
            ->toThrow(InvalidEmailAddress::class);
    })->with([
        '',
        '    ',
        "   \t   ",
        "\n",
        "\r\n",
        '<PHP_EOL>',
    ]);
});
