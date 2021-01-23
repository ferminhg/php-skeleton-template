<?php

declare(strict_types=1);

namespace Devaway\Shared\Domain;

interface UuidGenerator
{
    public function generate(): string;
}
