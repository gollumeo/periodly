<?php

declare(strict_types=1);

use Domain\User\ValueObjects\UserAccount\UserEmail;
use Domain\User\ValueObjects\UserAccount\Username;

describe('Feature: User registration', function (): void {
    it('creates a new user based on user account data', function (): void {
        $email = new UserEmail('test@test.com');
        $username = new Username('d@mn-periods');
        $password = new Password('Strongp4ss!');
        $userAccount = new UserAccount($email, $username, $password);

        $registerUser = new RegisterUser(); // use case
        $userId = ($registerUser)($userAccount); // invokable
    });
})->skip('todo');
