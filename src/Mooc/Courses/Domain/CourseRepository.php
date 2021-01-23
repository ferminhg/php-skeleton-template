<?php

declare(strict_types=1);

namespace Devaway\Mooc\Courses\Domain;

use Devaway\Mooc\Shared\Domain\Courses\CourseId;

interface CourseRepository
{
    public function save(Course $course): void;

    public function search(CourseId $id): ?Course;
}
