<?php

declare(strict_types=1);

namespace Devaway\Mooc\CoursesCounter\Infrastructure\Persistence\Doctrine;

use Devaway\Mooc\Shared\Domain\Courses\CourseId;
use Devaway\Shared\Infrastructure\Doctrine\Dbal\DoctrineCustomType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\JsonType;
use function Lambdish\Phunctional\map;

final class CourseIdsType extends JsonType implements DoctrineCustomType
{
    public static function customTypeName(): string
    {
        return 'course_ids';
    }

    public function getName(): string
    {
        return self::customTypeName();
    }

    /** @var CourseId[] $value */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return parent::convertToDatabaseValue(map(fn(CourseId $id) => $id->value(), $value), $platform);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $scalars = parent::convertToPHPValue($value, $platform);

        return map(fn(string $value) => new CourseId($value), $scalars);
    }
}
