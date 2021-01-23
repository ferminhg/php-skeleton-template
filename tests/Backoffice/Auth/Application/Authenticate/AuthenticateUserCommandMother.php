<?php

declare(strict_types=1);

namespace Devaway\Tests\Backoffice\Auth\Application\Authenticate;

use Devaway\Backoffice\Auth\Application\Authenticate\AuthenticateUserCommand;
use Devaway\Backoffice\Auth\Domain\AuthPassword;
use Devaway\Backoffice\Auth\Domain\AuthUsername;
use Devaway\Tests\Backoffice\Auth\Domain\AuthPasswordMother;
use Devaway\Tests\Backoffice\Auth\Domain\AuthUsernameMother;

final class AuthenticateUserCommandMother
{
    public static function create(
        ?AuthUsername $username = null,
        ?AuthPassword $password = null
    ): AuthenticateUserCommand {
        return new AuthenticateUserCommand(
            $username?->value() ?? AuthUsernameMother::create()->value(),
            $password?->value() ?? AuthPasswordMother::create()->value()
        );
    }
}
