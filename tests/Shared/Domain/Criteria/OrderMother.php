<?php

declare(strict_types=1);

namespace Devaway\Tests\Shared\Domain\Criteria;

use Devaway\Shared\Domain\Criteria\Order;
use Devaway\Shared\Domain\Criteria\OrderBy;
use Devaway\Shared\Domain\Criteria\OrderType;

final class OrderMother
{
    public static function create(?OrderBy $orderBy = null, ?OrderType $orderType = null): Order
    {
        return new Order($orderBy ?? OrderByMother::create(), $orderType ?? OrderType::random());
    }

    public static function none(): Order
    {
        return Order::none();
    }
}
