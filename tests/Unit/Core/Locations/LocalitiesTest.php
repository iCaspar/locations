<?php

declare(strict_types=1);

namespace App\Core\Locations;

use App\Infrastructure\Locations\InMemoryRepository;
use Mockery;
use PHPUnit\Framework\TestCase;

final class LocalitiesTest extends TestCase
{
    /**
     * @test
     */
    public function finds_5_sorted_localities_matching_name_fragment(): void
    {
        $repository = new InMemoryRepository();
        $localities = new Localities($repository);
        $this->assertSame(
            ['Atlanta', 'San Antonio', 'Antwerp', 'Canton', 'Santa Cruz'],
            $localities->find('ant')
        );
    }

    /**
     * @test
     */
    public function finds_given_number_sorted_localities_matching_name_fragment(): void
    {
        $repository = new InMemoryRepository();
        $localities = new Localities($repository);
        $this->assertSame(
            ['Atlanta', 'San Antonio', 'Antwerp'],
            $localities->find('ant', 3)
        );
    }

    /**
     * @test
     */
    public function does_not_sort_localities_matching_name_fragment_when_specified(): void
    {
        $repository = new InMemoryRepository();
        $localities = new Localities($repository);
        $this->assertSame(
            ['Canton', 'San Antonio', 'Antwerp', 'Atlanta', 'Antigua'],
            $localities->find('ant', 5, false)
        );
    }
}
