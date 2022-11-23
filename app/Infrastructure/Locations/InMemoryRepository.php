<?php

declare(strict_types=1);

namespace App\Infrastructure\Locations;

final class InMemoryRepository implements \App\Core\Locations\Repository
{
    private array $locations = [
        'Canton'      => 4,
        'San Antonio' => 2,
        'Antwerp'     => 3,
        'Atlanta'     => 1,
        'Antigua'     => 6,
        'Santa Cruz'  => 5
    ];

    public function findLocalities(string $nameFragment, int $limit, bool $byPopularity): array
    {
        $locations = $this->locations;
        if ($byPopularity) {
            asort($locations);
        }

        return array_slice(
            array_keys($locations),
            0,
            $limit
        );
    }
}
