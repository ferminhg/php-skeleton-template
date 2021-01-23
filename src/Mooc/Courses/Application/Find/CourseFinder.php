<?php

declare(strict_types=1);

namespace Devaway\Mooc\Courses\Application\Find;

use Devaway\Mooc\Courses\Domain\Course;
use Devaway\Mooc\Courses\Domain\CourseNotExist;
use Devaway\Mooc\Courses\Domain\CourseRepository;
use Devaway\Mooc\Shared\Domain\Courses\CourseId;

final class CourseFinder
{
    public function __construct(private CourseRepository $repository)
    {
    }

    public function __invoke(CourseId $id): Course
    {
        $course = $this->repository->search($id);

        if (null === $course) {
            throw new CourseNotExist($id);
        }

        return $course;
    }
}
