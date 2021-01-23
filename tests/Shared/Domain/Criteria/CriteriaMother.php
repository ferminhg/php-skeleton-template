<?php

declare(strict_types=1);

namespace Devaway\Tests\Shared\Domain\Criteria;

use Devaway\Shared\Domain\Criteria\Criteria;
use Devaway\Shared\Domain\Criteria\Filters;
use Devaway\Shared\Domain\Criteria\Order;

final class CriteriaMother
{
    public static function create(
        Filters $filters,
        Order $order = null,
        int $offset = null,
        int $limit = null
    ): Criteria {
        return new Criteria($filters, $order ?: OrderMother::none(), $offset, $limit);
    }

    public static function empty(): Criteria
    {
        return self::create(FiltersMother::blank(), OrderMother::none());
    }
}
