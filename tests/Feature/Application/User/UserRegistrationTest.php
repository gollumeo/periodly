<?php

declare(strict_types=1);

use Domain\User\ValueObjects\UserAccount\PlainPassword;
use Domain\User\ValueObjects\UserAccount\UserAccount;
use Domain\User\ValueObjects\UserAccount\UserAccountStatus;
use Domain\User\ValueObjects\UserAccount\UserEmail;
use Domain\User\ValueObjects\UserAccount\Username;
use Tests\Fakes\InMemoryUsers;

describe('Feature: Register User', function (): void {
    it('registers a new user with valid credentials', function (): void {
        $users = new InMemoryUsers();
        $hashPassword = new HashPassword();
        $events = new FakeEventBus();

        $registerUser = new RegisterUser($users, $hashPassword, $events);

        $userAccount = new UserAccount(
            new UserEmail('test@test.com'),
            new Username('d@mn-periods'),
            new PlainPassword('Strongp4ssword!')
        );

        $userId = $registerUser($userAccount);
        expect($userId)->toBeInstanceOf(UserId::class);

        $user = $users->findById($userId);
        expect($user)->not->toBeNull()
            ->and($user->username())->toBe('d@mn-periods')
            ->and($user->email())->toBe('test@test.com')
            ->and($user->accountStatus())->toBe(UserAccountStatus::Registered)
            ->and($events->recorded())->toHaveCount(1)
            ->first()->toBeInstanceOf(UserWasRegistered::class);
    });
});
