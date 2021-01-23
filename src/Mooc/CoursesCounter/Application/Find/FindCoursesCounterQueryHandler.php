<?php

declare(strict_types=1);

namespace Devaway\Mooc\CoursesCounter\Application\Find;

use Devaway\Shared\Domain\Bus\Query\QueryHandler;

final class FindCoursesCounterQueryHandler implements QueryHandler
{
    public function __construct(private CoursesCounterFinder $finder)
    {
    }

    public function __invoke(FindCoursesCounterQuery $query): CoursesCounterResponse
    {
        return $this->finder->__invoke();
    }
}
