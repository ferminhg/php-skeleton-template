<?php

declare(strict_types=1);

namespace Devaway\Mooc\Videos\Application\Find;

use Devaway\Shared\Domain\Bus\Query\Response;

final class VideoResponse implements Response
{
    public function __construct(
        private string $id,
        private string $type,
        private string $title,
        private string $url,
        private string $courseId
    ) {
    }
}
