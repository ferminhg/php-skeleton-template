<?php

declare(strict_types=1);

namespace Devaway\Mooc\Videos\Application\Update;

use Devaway\Mooc\Videos\Domain\VideoFinder;
use Devaway\Mooc\Videos\Domain\VideoId;
use Devaway\Mooc\Videos\Domain\VideoRepository;
use Devaway\Mooc\Videos\Domain\VideoTitle;

final class VideoTitleUpdater
{
    private VideoFinder $finder;

    public function __construct(private VideoRepository $repository)
    {
        $this->finder = new VideoFinder($repository);
    }

    public function __invoke(VideoId $id, VideoTitle $newTitle): void
    {
        $video = $this->finder->__invoke($id);

        $video->updateTitle($newTitle);

        $this->repository->save($video);
    }
}
