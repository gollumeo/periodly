<?php

declare(strict_types=1);

use Tests\Fakes\Framework\FakeStringVO;

describe('Framework: String Value Object', function (): void {
    it('creates from a string via factory method', function (): void {
        $valueObject = FakeStringVO::fromString('abc');

        expect((string) $valueObject)->toBe('abc');
    });

    it('returns raw value via `value()`', function (): void {
        $valueObject = FakeStringVO::fromString('hello');
        expect($valueObject->value())->toBe('hello');
    });

    it('compares value objects by value', function (): void {
        $firstVO = FakeStringVO::fromString('abc');
        $secondVO = FakeStringVO::fromString('abc');
        $thirdVO = FakeStringVO::fromString('hello');

        expect($firstVO->equals($secondVO))->toBeTrue()
            ->and($firstVO->equals($thirdVO))->toBeFalse();
    });

    it('is immutable', function (): void {
        $valueObject = FakeStringVO::fromString('abc');

        expect(method_exists($valueObject, '__set'))->toBeFalse();
    });

    it('validates the input during construction', function (): void {
        expect(fn () => FakeStringVO::fromString(''))->toThrow(InvalidArgumentException::class);
    });

    it('cannot be instantiated directly using `new`', function (): void {
        // @phpstan-ignore-next-line
        expect(fn () => new FakeStringVO('abc'))->toThrow(Error::class);
    });
});
