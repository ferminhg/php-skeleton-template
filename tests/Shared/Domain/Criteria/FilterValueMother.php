<?php

declare(strict_types=1);

namespace Devaway\Tests\Shared\Domain\Criteria;

use Devaway\Shared\Domain\Criteria\FilterValue;
use Devaway\Tests\Shared\Domain\WordMother;

final class FilterValueMother
{
    public static function create(?string $value = null): FilterValue
    {
        return new FilterValue($value ?? WordMother::create());
    }
}
