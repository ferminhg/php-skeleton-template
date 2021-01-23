<?php

declare(strict_types=1);

namespace Devaway\Mooc\CoursesCounter\Application\Increment;

use Devaway\Mooc\Courses\Domain\CourseCreatedDomainEvent;
use Devaway\Mooc\Shared\Domain\Courses\CourseId;
use Devaway\Shared\Domain\Bus\Event\DomainEventSubscriber;
use function Lambdish\Phunctional\apply;

final class IncrementCoursesCounterOnCourseCreated implements DomainEventSubscriber
{
    public function __construct(private CoursesCounterIncrementer $incrementer)
    {
    }

    public static function subscribedTo(): array
    {
        return [CourseCreatedDomainEvent::class];
    }

    public function __invoke(CourseCreatedDomainEvent $event): void
    {
        $courseId = new CourseId($event->aggregateId());

        apply($this->incrementer, [$courseId]);
    }
}
