<?php

declare(strict_types=1);

use Domain\User\Exceptions\InvalidEmailAddress;
use Domain\User\ValueObjects\EmailAddress;

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
        PHP_EOL,
    ]);

    it('returns the raw email string via `value()`', function (): void {
        $email = EmailAddress::fromString('test@test.com');
        expect($email->value())->toBe('test@test.com');
    });

    it('can be cast to string', function (): void {
        $email = EmailAddress::fromString('test@test.com');

        expect((string) $email)->toBe('test@test.com');
    });

    it('considers two identical email addresses as equal', function (): void {
        $a = EmailAddress::fromString('test@test.com');
        $b = EmailAddress::fromString('test@test.com');

        expect($a->equals($b))->toBeTrue();
    });

    it('considers two different email addresses as not equal', function (): void {
        $a = EmailAddress::fromString('test@test.com');
        $b = EmailAddress::fromString('other@test.com');

        expect($a->equals($b))->toBeFalse();
    });

    it('cannot have its value mutated after creation', function (): void {
        $email = EmailAddress::fromString('test@test.com');
        // @phpstan-ignore-next-line
        expect(fn () => $email->value = 'hacked@test.com')
            ->toThrow(Error::class);
    });
});
