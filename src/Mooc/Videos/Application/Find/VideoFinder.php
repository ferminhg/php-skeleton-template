<?php

declare(strict_types=1);

namespace Devaway\Mooc\Videos\Application\Find;

use Devaway\Mooc\Videos\Domain\VideoFinder as DomainVideoFinder;
use Devaway\Mooc\Videos\Domain\VideoId;
use Devaway\Mooc\Videos\Domain\VideoRepository;

final class VideoFinder
{
    private DomainVideoFinder $finder;

    public function __construct(VideoRepository $repository)
    {
        $this->finder = new DomainVideoFinder($repository);
    }

    public function __invoke(VideoId $id)
    {
        return $this->finder->__invoke($id);
    }
}
