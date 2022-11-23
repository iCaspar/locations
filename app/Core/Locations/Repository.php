<?php

declare(strict_types=1);

namespace App\Core\Locations;

interface Repository
{
    public function findLocalities(
        string $nameFragment,
        int $limit,
        bool $byPopularity
    ): array;
}
