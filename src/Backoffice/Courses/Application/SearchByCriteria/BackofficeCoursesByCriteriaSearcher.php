<?php

declare(strict_types=1);

namespace Devaway\Backoffice\Courses\Application\SearchByCriteria;

use Devaway\Backoffice\Courses\Application\BackofficeCourseResponse;
use Devaway\Backoffice\Courses\Application\BackofficeCoursesResponse;
use Devaway\Backoffice\Courses\Domain\BackofficeCourse;
use Devaway\Backoffice\Courses\Domain\BackofficeCourseRepository;
use Devaway\Shared\Domain\Criteria\Criteria;
use Devaway\Shared\Domain\Criteria\Filters;
use Devaway\Shared\Domain\Criteria\Order;
use function Lambdish\Phunctional\map;

final class BackofficeCoursesByCriteriaSearcher
{
    public function __construct(private BackofficeCourseRepository $repository)
    {
    }

    public function search(Filters $filters, Order $order, ?int $limit, ?int $offset): BackofficeCoursesResponse
    {
        $criteria = new Criteria($filters, $order, $offset, $limit);

        return new BackofficeCoursesResponse(...map($this->toResponse(), $this->repository->matching($criteria)));
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
