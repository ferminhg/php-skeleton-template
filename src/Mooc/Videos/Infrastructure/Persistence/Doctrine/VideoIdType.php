<?php

declare(strict_types=1);

namespace Devaway\Mooc\Videos\Infrastructure\Persistence\Doctrine;

use Devaway\Mooc\Videos\Domain\VideoId;
use Devaway\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class VideoIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return VideoId::class;
    }
}

