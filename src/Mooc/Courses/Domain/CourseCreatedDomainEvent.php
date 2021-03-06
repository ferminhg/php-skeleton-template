<?php

declare(strict_types=1);

namespace Devaway\Mooc\Courses\Domain;

use Devaway\Shared\Domain\Bus\Event\DomainEvent;

final class CourseCreatedDomainEvent extends DomainEvent
{
    public function __construct(
        string $id,
        private string $name,
        private string $duration,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($id, $eventId, $occurredOn);
    }

    public static function eventName(): string
    {
        return 'course.created';
    }

    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): DomainEvent {
        return new self($aggregateId, $body['name'], $body['duration'], $eventId, $occurredOn);
    }

    public function toPrimitives(): array
    {
        return [
            'name'     => $this->name,
            'duration' => $this->duration,
        ];
    }

    public function name(): string
    {
        return $this->name;
    }

    public function duration(): string
    {
        return $this->duration;
    }
}
