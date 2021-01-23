<?php

declare(strict_types=1);

namespace Devaway\Mooc\Courses\Infrastructure\Persistence;

use Devaway\Mooc\Courses\Domain\Course;
use Devaway\Mooc\Courses\Domain\CourseRepository;
use Devaway\Mooc\Shared\Domain\Courses\CourseId;
use Devaway\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineCourseRepository extends DoctrineRepository implements CourseRepository
{
    public function save(Course $course): void
    {
        $this->persist($course);
    }

    public function search(CourseId $id): ?Course
    {
        return $this->repository(Course::class)->find($id);
    }
}
