<?php

declare(strict_types=1);

namespace Devaway\Tests\Shared\Infrastructure;

use Devaway\Shared\Domain\RandomNumberGenerator;

final class ConstantRandomNumberGenerator implements RandomNumberGenerator
{
    public function generate(): int
    {
        return 1;
    }
}
