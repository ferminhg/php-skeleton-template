<?php

declare(strict_types=1);

namespace Devaway\Analytics\DomainEvents\Application\Store;

use Devaway\Analytics\DomainEvents\Domain\AnalyticsDomainEvent;
use Devaway\Analytics\DomainEvents\Domain\AnalyticsDomainEventAggregateId;
use Devaway\Analytics\DomainEvents\Domain\AnalyticsDomainEventBody;
use Devaway\Analytics\DomainEvents\Domain\AnalyticsDomainEventId;
use Devaway\Analytics\DomainEvents\Domain\AnalyticsDomainEventName;
use Devaway\Analytics\DomainEvents\Domain\DomainEventsRepository;

final class DomainEventStorer
{
    public function __construct(private DomainEventsRepository $repository)
    {
    }

    public function store(
        AnalyticsDomainEventId $id,
        AnalyticsDomainEventAggregateId $aggregateId,
        AnalyticsDomainEventName $name,
        AnalyticsDomainEventBody $body
    ): void {
        $domainEvent = new AnalyticsDomainEvent($id, $aggregateId, $name, $body);

        $this->repository->save($domainEvent);
    }
}
