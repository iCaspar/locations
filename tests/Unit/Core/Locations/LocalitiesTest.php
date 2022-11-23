<?php

declare(strict_types=1);

namespace App\Core\Locations;

use Mockery;
use PHPUnit\Framework\TestCase;

final class LocalitiesTest extends TestCase
{
    /**
     * @test
     */
    public function finds_localities_matching_name_fragment_using_repository(): void
    {
        $repository = Mockery::mock(Repository::class);
        $repository->expects('findLocalities')
                   ->with('ant', 5, true)
                   ->andReturns(['Canton', 'San Antonio', 'Antwerp']);
        $localities = new Localities($repository);
        $this->assertSame(
            ['Canton', 'San Antonio', 'Antwerp'],
            $localities->find('ant')
        );
    }

    /**
     * @test
     */
    public function limits_found_localities_to_5_names_by_default(): void
    {
        $repository = Mockery::mock(Repository::class);
        $repository->expects('findLocalities')
                   ->with('ant', 5, true)
                   ->andReturns(
                       ['Canton', 'San Antonio', 'Antwerp', 'Atlanta', 'Antigua']
                   );
        $localities = new Localities($repository);
        $this->assertSame(
            ['Canton', 'San Antonio', 'Antwerp', 'Atlanta', 'Antigua'],
            $localities->find('ant')
        );
    }

    /**
     * @test
     */
    public function limits_found_localities_to_specified_number(): void
    {
        $repository = Mockery::mock(Repository::class);
        $repository->expects('findLocalities')
                   ->with('ant', 4, true)
                   ->andReturns(
                       ['Canton', 'San Antonio', 'Antwerp', 'Antigua']
                   );
        $localities = new Localities($repository);
        $this->assertSame(
            ['Canton', 'San Antonio', 'Antwerp', 'Antigua'],
            $localities->find('ant', 4)
        );
    }

    /**
     * @test
     */
    public function sorts_found_localities_by_popularity(): void
    {
        $repository = Mockery::mock(Repository::class);
        $repository->expects('findLocalities')
                   ->with('ant', 5, true)
                   ->andReturns(
                       ['Canton', 'San Antonio', 'Antwerp', 'Antigua']
                   );
        $localities = new Localities($repository);
        $this->assertSame(
            ['Canton', 'San Antonio', 'Antwerp', 'Antigua'],
            $localities->find('ant')
        );
    }

    /**
     * @test
     */
    public function does_not_sort_found_localities_when_specified(): void
    {
        $repository = Mockery::mock(Repository::class);
        $repository->expects('findLocalities')
                   ->with('ant', 5, false)
                   ->andReturns(
                       ['Canton', 'San Antonio', 'Antwerp', 'Antigua']
                   );
        $localities = new Localities($repository);
        $this->assertSame(
            ['Canton', 'San Antonio', 'Antwerp', 'Antigua'],
            $localities->find('ant', 5, false)
        );
    }
}
