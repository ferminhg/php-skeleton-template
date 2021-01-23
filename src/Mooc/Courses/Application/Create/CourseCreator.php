<?php

declare(strict_types=1);

namespace Devaway\Mooc\Courses\Application\Create;

use Devaway\Mooc\Courses\Domain\Course;
use Devaway\Mooc\Courses\Domain\CourseDuration;
use Devaway\Mooc\Courses\Domain\CourseName;
use Devaway\Mooc\Courses\Domain\CourseRepository;
use Devaway\Mooc\Shared\Domain\Courses\CourseId;
use Devaway\Shared\Domain\Bus\Event\EventBus;

final class CourseCreator
{
    public function __construct(private CourseRepository $repository, private EventBus $bus)
    {
    }

    public function __invoke(CourseId $id, CourseName $name, CourseDuration $duration): void
    {
        $course = Course::create($id, $name, $duration);

        $this->repository->save($course);
        $this->bus->publish(...$course->pullDomainEvents());
    }
}
