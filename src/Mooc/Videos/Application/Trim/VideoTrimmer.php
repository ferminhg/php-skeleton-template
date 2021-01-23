<?php

declare (strict_types=1);

namespace Devaway\Mooc\Videos\Application\Trim;

use Devaway\Mooc\Videos\Domain\VideoId;
use Devaway\Shared\Domain\SecondsInterval;

final class VideoTrimmer
{
    public function trim(VideoId $id, SecondsInterval $interval): void
    {
    }
}
