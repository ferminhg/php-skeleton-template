<?php

declare(strict_types=1);

namespace Devaway\Mooc\CoursesCounter\Application\Find;

use Devaway\Mooc\CoursesCounter\Domain\CoursesCounterNotExist;
use Devaway\Mooc\CoursesCounter\Domain\CoursesCounterRepository;

final class CoursesCounterFinder
{
    public function __construct(private CoursesCounterRepository $repository)
    {
    }

    public function __invoke(): CoursesCounterResponse
    {
        $counter = $this->repository->search();

        if (null === $counter) {
            throw new CoursesCounterNotExist();
        }

        return new CoursesCounterResponse($counter->total()->value());
    }
}
