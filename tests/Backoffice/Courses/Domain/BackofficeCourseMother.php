<?php

declare(strict_types=1);

namespace Devaway\Tests\Backoffice\Courses\Domain;

use Devaway\Backoffice\Courses\Domain\BackofficeCourse;
use Devaway\Tests\Mooc\Courses\Domain\CourseDurationMother;
use Devaway\Tests\Mooc\Courses\Domain\CourseIdMother;
use Devaway\Tests\Mooc\Courses\Domain\CourseNameMother;

final class BackofficeCourseMother
{
    public static function create(?string $id = null, ?string $name = null, ?string $duration = null): BackofficeCourse
    {
        return new BackofficeCourse(
            $id ?? CourseIdMother::create()->value(),
            $name ?? CourseNameMother::create()->value(),
            $duration ?? CourseDurationMother::create()->value()
        );
    }
}
