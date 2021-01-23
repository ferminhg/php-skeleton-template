<?php

declare(strict_types=1);

namespace Devaway\Backoffice\Auth\Application\Authenticate;

use Devaway\Backoffice\Auth\Domain\AuthPassword;
use Devaway\Backoffice\Auth\Domain\AuthRepository;
use Devaway\Backoffice\Auth\Domain\AuthUser;
use Devaway\Backoffice\Auth\Domain\AuthUsername;
use Devaway\Backoffice\Auth\Domain\InvalidAuthCredentials;
use Devaway\Backoffice\Auth\Domain\InvalidAuthUsername;

final class UserAuthenticator
{
    public function __construct(private AuthRepository $repository)
    {
    }

    public function authenticate(AuthUsername $username, AuthPassword $password): void
    {
        $auth = $this->repository->search($username);

        $this->ensureUserExist($auth, $username);
        $this->ensureCredentialsAreValid($auth, $password);
    }

    private function ensureUserExist(?AuthUser $auth, AuthUsername $username): void
    {
        if (null === $auth) {
            throw new InvalidAuthUsername($username);
        }
    }

    private function ensureCredentialsAreValid(AuthUser $auth, AuthPassword $password): void
    {
        if (!$auth->passwordMatches($password)) {
            throw new InvalidAuthCredentials($auth->username());
        }
    }
}
