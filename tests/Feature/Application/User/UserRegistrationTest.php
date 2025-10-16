<?php

declare(strict_types=1);

describe('Feature: User registration', function (): void {
    it('registers a new user with valid credentials', function (): void {
        $users = new InMemoryUsers();
        $passwordHash = new HashPassword();
        $events = new FakeEventBus();

        $registerUser = new RegisterUser($users, $passwordHash, $events);

        $userAccount = new UserAccount(
            new Username('d@mn-periods'),
            new UserEmail('test@test.com'),
            new PlainPassword('Strongp4ss!')
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
