<?php

declare(strict_types=1);

namespace Devaway\Mooc\Courses\Application\Update;

use Devaway\Mooc\Courses\Application\Find\CourseFinder;
use Devaway\Mooc\Courses\Domain\CourseName;
use Devaway\Mooc\Courses\Domain\CourseRepository;
use Devaway\Mooc\Shared\Domain\Courses\CourseId;
use Devaway\Shared\Domain\Bus\Event\EventBus;

final class CourseRenamer
{
    private CourseFinder     $finder;

    public function __construct(private CourseRepository $repository, private EventBus $bus)
    {
        $this->finder = new CourseFinder($repository);
    }

    public function __invoke(CourseId $id, CourseName $newName): void
    {
        $course = $this->finder->__invoke($id);

        $course->rename($newName);

        $this->repository->save($course);
        $this->bus->publish(...$course->pullDomainEvents());
    }
}
