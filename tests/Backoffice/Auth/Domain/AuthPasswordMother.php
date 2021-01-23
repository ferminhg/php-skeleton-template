<?php

declare(strict_types=1);

namespace Devaway\Tests\Backoffice\Auth\Domain;

use Devaway\Backoffice\Auth\Domain\AuthPassword;
use Devaway\Tests\Shared\Domain\UuidMother;

final class AuthPasswordMother
{
    public static function create(?string $value = null): AuthPassword
    {
        return new AuthPassword($value ?? UuidMother::create());
    }
}
