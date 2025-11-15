<?php

declare(strict_types=1);

use Domain\User\ValueObjects\UserAccount\PlainPassword;
use Domain\User\ValueObjects\UserAccount\UserAccount;
use Domain\User\ValueObjects\UserAccount\UserEmail;
use Domain\User\ValueObjects\UserAccount\Username;
use Domain\User\ValueObjects\UserId;

describe('Feature: Register User', function (): void {
    it('registers a new user with valid credentials', function (): void {
        $users = new InMemoryUsers();
        $hashPassword = new FakeHashPassword();
        $events = new FakeEventBus();

        $registerUser = new RegisterUser($users, $hashPassword, $events);

        $userAccount = new UserAccount(
            new UserEmail('test@test.com'),
            new Username('Gollum'),
            new PlainPassword('Strongp4ssword!')
        );

        $userId = $registerUser($userAccount);

        expect($userId)->toBeInstanceOf(UserId::class);
    });
});
