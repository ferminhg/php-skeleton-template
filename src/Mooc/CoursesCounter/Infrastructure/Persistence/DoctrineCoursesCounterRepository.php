<?php

declare(strict_types=1);

namespace Devaway\Mooc\CoursesCounter\Infrastructure\Persistence;

use Devaway\Mooc\CoursesCounter\Domain\CoursesCounter;
use Devaway\Mooc\CoursesCounter\Domain\CoursesCounterRepository;
use Devaway\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineCoursesCounterRepository extends DoctrineRepository implements CoursesCounterRepository
{
    public function save(CoursesCounter $counter): void
    {
        $this->persist($counter);
    }

    public function search(): ?CoursesCounter
    {
        return $this->repository(CoursesCounter::class)->findOneBy([]);
    }
}
