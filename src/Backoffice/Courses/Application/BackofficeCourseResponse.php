<?php

declare(strict_types=1);

namespace Devaway\Backoffice\Courses\Application;

final class BackofficeCourseResponse
{
    public function __construct(private string $id, private string $name, private string $duration)
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function duration(): string
    {
        return $this->duration;
    }
}
