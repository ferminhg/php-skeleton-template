<?php

declare(strict_types=1);

namespace Devaway\Mooc\Videos\Domain;

use Devaway\Shared\Domain\DomainError;

final class VideoNotFound extends DomainError
{
    public function __construct(private VideoId $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'video_not_found';
    }

    protected function errorMessage(): string
    {
        return sprintf('The video <%s> has not been found', $this->id->value());
    }
}
