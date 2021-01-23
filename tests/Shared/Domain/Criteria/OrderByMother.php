<?php

declare(strict_types=1);

namespace Devaway\Tests\Shared\Domain\Criteria;

use Devaway\Shared\Domain\Criteria\OrderBy;
use Devaway\Tests\Shared\Domain\WordMother;

final class OrderByMother
{
    public static function create(?string $fieldName = null): OrderBy
    {
        return new OrderBy($fieldName ?? WordMother::create());
    }
}
