<?php

declare(strict_types=1);

namespace Devaway\Backoffice\Courses\Application\SearchAll;

use Devaway\Backoffice\Courses\Application\BackofficeCourseResponse;
use Devaway\Backoffice\Courses\Application\BackofficeCoursesResponse;
use Devaway\Backoffice\Courses\Domain\BackofficeCourse;
use Devaway\Backoffice\Courses\Domain\BackofficeCourseRepository;
use function Lambdish\Phunctional\map;

final class AllBackofficeCoursesSearcher
{
    public function __construct(private BackofficeCourseRepository $repository)
    {
    }

    public function searchAll(): BackofficeCoursesResponse
    {
        return new BackofficeCoursesResponse(...map($this->toResponse(), $this->repository->searchAll()));
    }

    private function toResponse(): callable
    {
        return static fn(BackofficeCourse $course) => new BackofficeCourseResponse(
            $course->id(),
            $course->name(),
            $course->duration()
        );
    }
}
