<?php

declare(strict_types=1);

namespace Devaway\Backoffice\Auth\Infrastructure\Persistence;

use Devaway\Backoffice\Auth\Domain\AuthPassword;
use Devaway\Backoffice\Auth\Domain\AuthRepository;
use Devaway\Backoffice\Auth\Domain\AuthUser;
use Devaway\Backoffice\Auth\Domain\AuthUsername;
use function Lambdish\Phunctional\get;

final class InMemoryAuthRepository implements AuthRepository
{
    private const USERS = [
        'javi' => 'barbitas',
        'rafa' => 'pelazo',
    ];

    public function search(AuthUsername $username): ?AuthUser
    {
        $password = get($username->value(), self::USERS);

        return null !== $password ? new AuthUser($username, new AuthPassword($password)) : null;
    }
}
