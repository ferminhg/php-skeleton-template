<?php

declare(strict_types=1);

namespace Devaway\Tests\Backoffice\Courses\Domain;

use Devaway\Shared\Domain\Criteria\Criteria;
use Devaway\Tests\Shared\Domain\Criteria\CriteriaMother;
use Devaway\Tests\Shared\Domain\Criteria\FilterMother;
use Devaway\Tests\Shared\Domain\Criteria\FiltersMother;

final class BackofficeCourseCriteriaMother
{
    public static function nameContains(string $text): Criteria
    {
        return CriteriaMother::create(
            FiltersMother::createOne(
                FilterMother::fromValues(
                    [
                        'field'    => 'name',
                        'operator' => 'CONTAINS',
                        'value'    => $text,
                    ]
                )
            )
        );
    }
}
