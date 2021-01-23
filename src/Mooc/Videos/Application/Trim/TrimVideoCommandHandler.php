<?php

declare (strict_types=1);

namespace Devaway\Mooc\Videos\Application\Trim;

use Devaway\Mooc\Videos\Domain\VideoId;
use Devaway\Shared\Domain\SecondsInterval;

final class TrimVideoCommandHandler
{
    public function __construct(private VideoTrimmer $trimmer)
    {
    }

    public function __invoke(TrimVideoCommand $command)
    {
        $id       = new VideoId($command->videoId());
        $interval = SecondsInterval::fromValues($command->keepFromSecond(), $command->keepToSecond());

        $this->trimmer->trim($id, $interval);
    }
}
