<?php

declare(strict_types=1);

namespace Devaway\Mooc\Videos\Domain;

use Devaway\Shared\Domain\Collection;

final class Videos extends Collection
{
    protected function type(): string
    {
        return Video::class;
    }
}
