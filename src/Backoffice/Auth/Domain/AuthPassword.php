<?php

declare(strict_types=1);

namespace Devaway\Backoffice\Auth\Domain;

use Devaway\Shared\Domain\ValueObject\StringValueObject;

final class AuthPassword extends StringValueObject
{
    public function isEquals(AuthPassword $other): bool
    {
        return $this->value() === $other->value();
    }
}
