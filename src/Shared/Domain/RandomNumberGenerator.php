<?php

declare(strict_types=1);

namespace Devaway\Shared\Domain;

interface RandomNumberGenerator
{
    public function generate(): int;
}
