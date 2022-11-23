<?php

declare(strict_types=1);

namespace App\Core\Locations;

interface Locator
{
    public function find(
        string $nameFragment,
        int $limit = 5,
        bool $byPopularity = true
    ): array;
}
