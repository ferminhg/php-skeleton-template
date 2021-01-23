<?php

declare(strict_types=1);

namespace Devaway\Backoffice\Courses\Application\SearchByCriteria;

use Devaway\Backoffice\Courses\Application\BackofficeCoursesResponse;
use Devaway\Shared\Domain\Bus\Query\QueryHandler;
use Devaway\Shared\Domain\Criteria\Filters;
use Devaway\Shared\Domain\Criteria\Order;

final class SearchBackofficeCoursesByCriteriaQueryHandler implements QueryHandler
{
    public function __construct(private BackofficeCoursesByCriteriaSearcher $searcher)
    {
    }

    public function __invoke(SearchBackofficeCoursesByCriteriaQuery $query): BackofficeCoursesResponse
    {
        $filters = Filters::fromValues($query->filters());
        $order   = Order::fromValues($query->orderBy(), $query->order());

        return $this->searcher->search($filters, $order, $query->limit(), $query->offset());
    }
}
