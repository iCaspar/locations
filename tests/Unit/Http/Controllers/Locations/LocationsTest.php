<?php

declare(strict_types=1);

namespace App\Http\Controllers\Locations;

use App\Core\Locations\Localities;
use App\Infrastructure\Locations\InMemoryRepository;
use Illuminate\Http\Request;
use Tests\TestCase;

final class LocationsTest extends TestCase
{
    /**
     * @test
     */
    public function returns_a_list_of_localities_given_a_name_fragment(): void
    {
        $repository = new InMemoryRepository();
        $localities = new Localities($repository);
        $controller = new Locations($localities);
        $request = new Request();
        $request->merge(['name' => 'ant']);
        $response = $controller->findLocalities($request);
        $this->assertSame(
            ['Atlanta', 'San Antonio', 'Antwerp', 'Canton', 'Santa Cruz'],
            json_decode($response->getContent(), true)
        );
    }
}
