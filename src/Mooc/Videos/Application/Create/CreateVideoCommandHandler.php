<?php

declare(strict_types=1);

namespace Devaway\Mooc\Videos\Application\Create;

use Devaway\Mooc\Shared\Domain\Courses\CourseId;
use Devaway\Mooc\Shared\Domain\Videos\VideoUrl;
use Devaway\Mooc\Videos\Domain\VideoId;
use Devaway\Mooc\Videos\Domain\VideoTitle;
use Devaway\Mooc\Videos\Domain\VideoType;
use Devaway\Shared\Domain\Bus\Command\CommandHandler;

final class CreateVideoCommandHandler implements CommandHandler
{
    public function __construct(private VideoCreator $creator)
    {
    }

    public function __invoke(CreateVideoCommand $command)
    {
        $id       = new VideoId($command->id());
        $type     = new VideoType($command->type());
        $title    = new VideoTitle($command->title());
        $url      = new VideoUrl($command->url());
        $courseId = new CourseId($command->courseId());

        $this->creator->create($id, $type, $title, $url, $courseId);
    }
}
