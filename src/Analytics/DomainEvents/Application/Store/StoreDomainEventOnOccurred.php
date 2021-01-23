<?php

declare(strict_types=1);

namespace Devaway\Analytics\DomainEvents\Application\Store;

use Devaway\Analytics\DomainEvents\Domain\AnalyticsDomainEventAggregateId;
use Devaway\Analytics\DomainEvents\Domain\AnalyticsDomainEventBody;
use Devaway\Analytics\DomainEvents\Domain\AnalyticsDomainEventId;
use Devaway\Analytics\DomainEvents\Domain\AnalyticsDomainEventName;
use Devaway\Shared\Domain\Bus\Event\DomainEvent;
use Devaway\Shared\Domain\Bus\Event\DomainEventSubscriber;

final class StoreDomainEventOnOccurred implements DomainEventSubscriber
{
    public function __construct(private DomainEventStorer $storer)
    {
    }

    public static function subscribedTo(): array
    {
        return [DomainEvent::class];
    }

    public function __invoke(DomainEvent $event): void
    {
        $id          = new AnalyticsDomainEventId($event->eventId());
        $aggregateId = new AnalyticsDomainEventAggregateId($event->aggregateId());
        $name        = new AnalyticsDomainEventName($event::eventName());
        $body        = new AnalyticsDomainEventBody($event->toPrimitives());

        $this->storer->store($id, $aggregateId, $name, $body);
    }
}
