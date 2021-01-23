<?php

declare(strict_types=1);

namespace Devaway\Mooc\Videos\Application\Create;

use Devaway\Mooc\Shared\Domain\Courses\CourseId;
use Devaway\Mooc\Shared\Domain\Videos\VideoUrl;
use Devaway\Mooc\Videos\Domain\Video;
use Devaway\Mooc\Videos\Domain\VideoId;
use Devaway\Mooc\Videos\Domain\VideoRepository;
use Devaway\Mooc\Videos\Domain\VideoTitle;
use Devaway\Mooc\Videos\Domain\VideoType;
use Devaway\Shared\Domain\Bus\Event\EventBus;

final class VideoCreator
{
    public function __construct(private VideoRepository $repository, private EventBus $bus)
    {
    }

    public function create(VideoId $id, VideoType $type, VideoTitle $title, VideoUrl $url, CourseId $courseId): void
    {
        $video = Video::create($id, $type, $title, $url, $courseId);

        $this->repository->save($video);

        $this->bus->publish(...$video->pullDomainEvents());
    }
}
