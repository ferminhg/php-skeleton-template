<?php

declare(strict_types=1);

namespace Devaway\Mooc\Shared\Infrastructure\Doctrine;

use Devaway\Shared\Infrastructure\Doctrine\DoctrineEntityManagerFactory;
use Doctrine\ORM\EntityManagerInterface;

final class MoocEntityManagerFactory
{
    private const SCHEMA_PATH = __DIR__ . '/../../../../../etc/databases/mooc.sql';

    public static function create(array $parameters, string $environment): EntityManagerInterface
    {
        $isDevMode = 'prod' !== $environment;

        $prefixes = array_merge(
            DoctrinePrefixesSearcher::inPath(__DIR__ . '/../../../../Mooc', 'Devaway\Mooc'),
            DoctrinePrefixesSearcher::inPath(__DIR__ . '/../../../../Backoffice', 'Devaway\Backoffice')
        );

        $dbalCustomTypesClasses = DbalTypesSearcher::inPath(__DIR__ . '/../../../../Mooc', 'Mooc');

        return DoctrineEntityManagerFactory::create(
            $parameters,
            $prefixes,
            $isDevMode,
            self::SCHEMA_PATH,
            $dbalCustomTypesClasses
        );
    }
}
