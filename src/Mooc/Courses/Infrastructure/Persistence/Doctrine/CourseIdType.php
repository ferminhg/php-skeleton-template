<?php

declare(strict_types=1);

namespace Devaway\Mooc\Courses\Infrastructure\Persistence\Doctrine;

use Devaway\Mooc\Shared\Domain\Courses\CourseId;
use Devaway\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CourseIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return CourseId::class;
    }
}
