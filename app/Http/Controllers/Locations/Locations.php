<?php

declare(strict_types=1);

namespace App\Http\Controllers\Locations;

use App\Core\Locations\Localities;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

final class Locations extends Controller
{
    public function __construct(
        private readonly Localities $localities
    ) {
    }

    public function findLocalities(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            ['name' => 'required|string']
        );
        if ($validator->fails()) {
            return new JsonResponse($validator->messages(), 400);
        }

        return new JsonResponse(
            $this->localities->find($request->get('name'))
        );
    }
}
