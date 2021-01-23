<?php

declare(strict_types=1);

namespace Devaway\Backoffice\Courses\Application\Create;

use Devaway\Backoffice\Courses\Domain\BackofficeCourse;
use Devaway\Backoffice\Courses\Domain\BackofficeCourseRepository;

final class BackofficeCourseCreator
{
    public function __construct(private BackofficeCourseRepository $repository)
    {
    }

    public function create(string $id, string $name, string $duration): void
    {
        $this->repository->save(new BackofficeCourse($id, $name, $duration));
    }
}
