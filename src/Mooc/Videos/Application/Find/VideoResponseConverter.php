<?php

declare(strict_types=1);

namespace Devaway\Mooc\Videos\Application\Find;

use Devaway\Mooc\Videos\Domain\Video;

final class VideoResponseConverter
{
    public function __invoke(Video $video): VideoResponse
    {
        return new VideoResponse(
            $video->id()->value(),
            $video->type()->value(),
            $video->title()->value(),
            $video->url()->value(),
            $video->courseId()->value()
        );
    }
}
