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
        $controller = $this->controller();
        $request    = new Request();
        $request->merge(['name' => 'ant']);
        $response = $controller->findLocalities($request);
        $this->assertSame(
            ['Atlanta', 'San Antonio', 'Antwerp', 'Canton', 'Santa Cruz'],
            json_decode($response->getContent(), true)
        );
    }

    /**
     * @test
     */
    public function returns_error_when_name_not_provided(): void
    {
        $controller = $this->controller();
        $request = new Request();
        $response = $controller->findLocalities($request);
        $this->assertSame(400, $response->getStatusCode());
        $this->assertSame(
            ['name' => ['The name field is required.']],
            json_decode($response->getContent(), true)
        );
    }

    private function controller(): Locations
    {
        $repository = new InMemoryRepository();
        $localities = new Localities($repository);
        return new Locations($localities);
    }
}
