<?php

declare(strict_types=1);

namespace Devaway\Mooc\CoursesCounter\Application\Increment;

use Devaway\Mooc\CoursesCounter\Domain\CoursesCounter;
use Devaway\Mooc\CoursesCounter\Domain\CoursesCounterId;
use Devaway\Mooc\CoursesCounter\Domain\CoursesCounterRepository;
use Devaway\Mooc\Shared\Domain\Courses\CourseId;
use Devaway\Shared\Domain\Bus\Event\EventBus;
use Devaway\Shared\Domain\UuidGenerator;

final class CoursesCounterIncrementer
{
    public function __construct(
        private CoursesCounterRepository $repository,
        private UuidGenerator $uuidGenerator,
        private EventBus $bus
    ) {
    }

    public function __invoke(CourseId $courseId): void
    {
        $counter = $this->repository->search() ?: $this->initializeCounter();

        if (!$counter->hasIncremented($courseId)) {
            $counter->increment($courseId);

            $this->repository->save($counter);
            $this->bus->publish(...$counter->pullDomainEvents());
        }
    }

    private function initializeCounter(): CoursesCounter
    {
        return CoursesCounter::initialize(new CoursesCounterId($this->uuidGenerator->generate()));
    }
}
