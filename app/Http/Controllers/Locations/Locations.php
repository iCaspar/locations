<?php

declare(strict_types=1);

namespace App\Http\Controllers\Locations;

use App\Core\Locations\Localities;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class Locations extends Controller
{
    public function __construct(
        private readonly Localities $localities
    ) {
    }

    public function findLocalities(
        Request $request
    ): JsonResponse {
        return new JsonResponse(
            $this->localities->find($request->get('name'))
        );
    }
}
