<?php

declare(strict_types=1);

namespace Devaway\Mooc\CoursesCounter\Domain;

interface CoursesCounterRepository
{
    public function save(CoursesCounter $counter): void;

    public function search(): ?CoursesCounter;
}
