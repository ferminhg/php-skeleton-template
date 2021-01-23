<?php

declare(strict_types=1);

namespace Devaway\Mooc\CoursesCounter\Infrastructure\Persistence\Doctrine;

use Devaway\Mooc\CoursesCounter\Domain\CoursesCounterId;
use Devaway\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CourseCounterIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return CoursesCounterId::class;
    }
}
