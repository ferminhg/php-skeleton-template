<?php

declare(strict_types=1);

namespace Devaway\Mooc\Courses\Application\Create;

use Devaway\Mooc\Courses\Domain\CourseDuration;
use Devaway\Mooc\Courses\Domain\CourseName;
use Devaway\Mooc\Shared\Domain\Courses\CourseId;
use Devaway\Shared\Domain\Bus\Command\CommandHandler;

final class CreateCourseCommandHandler implements CommandHandler
{
    public function __construct(private CourseCreator $creator)
    {
    }

    public function __invoke(CreateCourseCommand $command): void
    {
        $id       = new CourseId($command->id());
        $name     = new CourseName($command->name());
        $duration = new CourseDuration($command->duration());

        $this->creator->__invoke($id, $name, $duration);
    }
}
