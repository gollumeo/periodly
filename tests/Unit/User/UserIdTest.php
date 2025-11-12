<?php

declare(strict_types=1);

use Domain\User\Exceptions\InvalidUserId;
use Domain\User\ValueObjects\UserId;
use Tests\Fakes\FakeUuid;

/** @noinspection PhpUnhandledExceptionInspection */
describe('Unit: User Id', function (): void {
    it('can be generated as a valid UUID v4', function (): void {
        $uuid = new FakeUuid();
        $id = UserId::generate($uuid);

        expect($id->value())->toMatch('/^[0-9a-fA-F-]{36}$/')
            ->and($id)->toBeInstanceOf(UserId::class);
    });

    it('can be reconstructed from a valid string', function (): void {
        $uuid = new FakeUuid();
        $id = UserId::fromString('123e4567-e89b-12d3-a456-426614174000', $uuid);

        expect($id->value())->toBe('123e4567-e89b-12d3-a456-426614174000');
    });

    it('fails when given an invalid UUID string', function (): void {
        $uuid = new FakeUuid();
        expect(
            fn () => UserId::fromString('this-is-a-valid-uuid', $uuid)
        )->toThrow(InvalidUserId::class);
    });

    it('assures two different UserIds are not equal', function (): void {
        $uuidA = new FakeUuid('aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa');
        $uuidB = new FakeUuid('bbbbbbbb-bbbb-bbbb-bbbb-bbbbbbbbbbbb');

        $firstId = UserId::generate($uuidA);
        $secondId = UserId::generate($uuidB);

        expect($firstId)->not->toEqual($secondId);
    });
});
