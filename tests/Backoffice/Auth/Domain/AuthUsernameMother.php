<?php

declare(strict_types=1);

namespace Devaway\Tests\Backoffice\Auth\Domain;

use Devaway\Backoffice\Auth\Domain\AuthUsername;
use Devaway\Tests\Shared\Domain\WordMother;

final class AuthUsernameMother
{
    public static function create(?string $value = null): AuthUsername
    {
        return new AuthUsername($value ?? WordMother::create());
    }
}
