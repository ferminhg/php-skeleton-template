<?php

declare(strict_types=1);

namespace Devaway\Backoffice\Auth\Application\Authenticate;

use Devaway\Backoffice\Auth\Domain\AuthPassword;
use Devaway\Backoffice\Auth\Domain\AuthUsername;
use Devaway\Shared\Domain\Bus\Command\CommandHandler;

final class AuthenticateUserCommandHandler implements CommandHandler
{
    public function __construct(private UserAuthenticator $authenticator)
    {
    }

    public function __invoke(AuthenticateUserCommand $command): void
    {
        $username = new AuthUsername($command->username());
        $password = new AuthPassword($command->password());

        $this->authenticator->authenticate($username, $password);
    }
}
