<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

final class Localities extends Controller
{
    public function findLocality(
        string $locality,
    ): JsonResponse {
        return new JsonResponse();
    }
}
