<?php

declare(strict_types=1);

namespace Devaway\Mooc\CoursesCounter\Application\Find;

use Devaway\Shared\Domain\Bus\Query\Response;

final class CoursesCounterResponse implements Response
{
    public function __construct(private int $total)
    {
    }

    public function total(): int
    {
        return $this->total;
    }
}
