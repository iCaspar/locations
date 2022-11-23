<?php

declare(strict_types=1);

namespace App\Core\Locations;

final class Localities implements Locator
{
    public function __construct(readonly private Repository $repository)
    {
    }

    public function find(
        string $nameFragment,
        int $limit = 5,
        bool $byPopularity = true
    ): array
    {
        return $this->repository->findLocalities(
            $nameFragment,
            $limit,
            $byPopularity
        );
    }
}
