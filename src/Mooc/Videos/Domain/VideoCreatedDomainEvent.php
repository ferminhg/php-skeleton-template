<?php

declare(strict_types=1);

namespace Devaway\Mooc\Videos\Domain;

use Devaway\Shared\Domain\Bus\Event\DomainEvent;

final class VideoCreatedDomainEvent extends DomainEvent
{
    public function __construct(
        string $id,
        private string $type,
        private string $title,
        private string $url,
        private string $courseId,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($id, $eventId, $occurredOn);
    }

    public static function eventName(): string
    {
        return 'video.created';
    }

    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): VideoCreatedDomainEvent {
        return new self(
            $aggregateId,
            $body['type'],
            $body['title'],
            $body['url'],
            $body['course_id'],
            $eventId,
            $occurredOn
        );
    }

    public function toPrimitives(): array
    {
        return [
            'type'      => $this->type,
            'title'     => $this->title,
            'url'       => $this->url,
            'course_id' => $this->courseId,
        ];
    }
}
