<?php

declare(strict_types=1);

namespace Devaway\Tests\Backoffice\Courses\Infrastructure\Persistence;

use Devaway\Tests\Backoffice\Courses\BackofficeCoursesModuleInfrastructureTestCase;
use Devaway\Tests\Backoffice\Courses\Domain\BackofficeCourseCriteriaMother;
use Devaway\Tests\Backoffice\Courses\Domain\BackofficeCourseMother;
use Devaway\Tests\Shared\Domain\Criteria\CriteriaMother;

final class MySqlBackofficeCourseRepositoryTest extends BackofficeCoursesModuleInfrastructureTestCase
{
    /** @test */
    public function it_should_save_a_valid_course(): void
    {
        $this->mySqlRepository()->save(BackofficeCourseMother::create());
    }

    /** @test */
    public function it_should_search_all_existing_courses(): void
    {
        $existingCourse        = BackofficeCourseMother::create();
        $anotherExistingCourse = BackofficeCourseMother::create();
        $existingCourses       = [$existingCourse, $anotherExistingCourse];

        $this->mySqlRepository()->save($existingCourse);
        $this->mySqlRepository()->save($anotherExistingCourse);

        $this->assertSimilar($existingCourses, $this->mySqlRepository()->searchAll());
    }

    /** @test */
    public function it_should_search_all_existing_courses_with_an_empty_criteria(): void
    {
        $existingCourse        = BackofficeCourseMother::create();
        $anotherExistingCourse = BackofficeCourseMother::create();
        $existingCourses       = [$existingCourse, $anotherExistingCourse];

        $this->mySqlRepository()->save($existingCourse);
        $this->mySqlRepository()->save($anotherExistingCourse);
        $this->clearUnitOfWork();

        $this->assertSimilar($existingCourses, $this->mySqlRepository()->matching(CriteriaMother::empty()));
    }

    /** @test */
    public function it_should_filter_by_criteria(): void
    {
        $dddInPhpCourse  = BackofficeCourseMother::create(name: 'DDD en PHP');
        $dddInJavaCourse = BackofficeCourseMother::create(name: 'DDD en Java');
        $intellijCourse  = BackofficeCourseMother::create(name: 'Exprimiendo Intellij');
        $dddCourses      = [$dddInPhpCourse, $dddInJavaCourse];

        $nameContainsDddCriteria = BackofficeCourseCriteriaMother::nameContains('DDD');

        $this->mySqlRepository()->save($dddInJavaCourse);
        $this->mySqlRepository()->save($dddInPhpCourse);
        $this->mySqlRepository()->save($intellijCourse);
        $this->clearUnitOfWork();

        $this->assertSimilar($dddCourses, $this->mySqlRepository()->matching($nameContainsDddCriteria));
    }
}
