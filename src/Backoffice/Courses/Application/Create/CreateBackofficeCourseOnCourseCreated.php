<?php

declare(strict_types=1);

namespace Devaway\Backoffice\Courses\Application\Create;

use Devaway\Mooc\Courses\Domain\CourseCreatedDomainEvent;
use Devaway\Shared\Domain\Bus\Event\DomainEventSubscriber;

final class CreateBackofficeCourseOnCourseCreated implements DomainEventSubscriber
{
    public function __construct(private BackofficeCourseCreator $creator)
    {
    }

    public static function subscribedTo(): array
    {
        return [CourseCreatedDomainEvent::class];
    }

    public function __invoke(CourseCreatedDomainEvent $event): void
    {
        $this->creator->create($event->aggregateId(), $event->name(), $event->duration());
    }
}
