<?php

declare(strict_types=1);

namespace Devaway\Mooc\Videos\Infrastructure\Persistence;

use Devaway\Mooc\Videos\Domain\Video;
use Devaway\Mooc\Videos\Domain\VideoId;
use Devaway\Mooc\Videos\Domain\VideoRepository;
use Devaway\Mooc\Videos\Domain\Videos;
use Devaway\Shared\Domain\Criteria\Criteria;
use Devaway\Shared\Infrastructure\Persistence\Doctrine\DoctrineCriteriaConverter;
use Devaway\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class VideoRepositoryMySql extends DoctrineRepository implements VideoRepository
{
    private static array $criteriaToDoctrineFields = [
        'id'        => 'id',
        'type'      => 'type',
        'title'     => 'title',
        'url'       => 'url',
        'course_id' => 'courseId',
    ];

    public function save(Video $video): void
    {
        $this->persist($video);
    }

    public function search(VideoId $id): ?Video
    {
        return $this->repository(Video::class)->find($id);
    }

    public function searchByCriteria(Criteria $criteria): Videos
    {
        $doctrineCriteria = DoctrineCriteriaConverter::convert($criteria, self::$criteriaToDoctrineFields);
        $videos           = $this->repository(Video::class)->matching($doctrineCriteria)->toArray();

        return new Videos($videos);
    }
}
