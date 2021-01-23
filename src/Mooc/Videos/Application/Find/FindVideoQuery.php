<?php

declare(strict_types=1);

namespace Devaway\Mooc\Videos\Application\Find;

use Devaway\Shared\Domain\Bus\Query\Query;

final class FindVideoQuery implements Query
{
    public function __construct(private string $id)
    {
    }

    public function id(): string
    {
        return $this->id;
    }
}
