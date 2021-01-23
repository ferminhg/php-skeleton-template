<?php

declare(strict_types=1);

namespace Devaway\Tests\Shared\Domain\Criteria;

use Devaway\Shared\Domain\Criteria\FilterField;
use Devaway\Tests\Shared\Domain\WordMother;

final class FilterFieldMother
{
    public static function create(?string $fieldName = null): FilterField
    {
        return new FilterField($fieldName ?? WordMother::create());
    }
}
