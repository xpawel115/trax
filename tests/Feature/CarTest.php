<?php

namespace Tests\Feature;

use App\Modules\Car\Actions\CreateCarAction;
use App\Modules\Car\DTO\CarData;
use App\Modules\Car\Models\Car;
use App\Modules\Car\Repositories\CarRepositoryInterface;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class CarTest extends TestCase
{
    private $user;
    private $carRepository;
    private $carAction;

    protected function setUp(): void
    {
        parent::setUp();

        $this->carRepository = App::make(CarRepositoryInterface::class);
        $this->carAction = App::make(CreateCarAction::class);

        $this->user = User::firstOrNew([
            'email'    => 'xpawel115@gmail.com',
            'name'     => 'Pawel',
            'password' => 'D7by8wg4'
        ]);
    }

    public function testGetCars(): void
    {
        // when
        $response = $this
            ->actingAs($this->user, 'api')
            ->json('GET', '/api/get-cars');

        // then
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson(['data' => []]);

    }

    public function testGetSingleCar(): void
    {
        $car = $this->carAction->execute(new CarData('2021', 'Volvo', 'xc90'));

        // when
        $response = $this
            ->actingAs($this->user, 'api')
            ->json('GET', '/api/get-car/' . $car->id);

        // then
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure([
            'data' => [
                "id",
                "make",
                "model",
                "year",
                "year",
                "trip_count",
                "trip_miles"
            ]
        ]);
    }

    public function testCreateCar(): void
    {
        // when
        $response = $this
            ->actingAs($this->user, 'api')
            ->json('POST', '/api/add-car', [
                'year'  => 2012,
                'make'  => 'Volvo',
                'model' => 'v90'
            ]);

        // then
        $id = $response['data']['id'];

        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertExactJson([
            'data' => [
                'id'    => $id,
                'year'  => 2012,
                'make'  => 'Volvo',
                'model' => 'v90'
            ]
        ]);

    }

    public function testDeleteCar(): void
    {
        $car = Car::firstOrNew([
            'year'  => 2012,
            'make'  => 'Volvo',
            'model' => 'v90'
        ]);

        // when
        $response = $this
            ->actingAs($this->user, 'api')
            ->json('DELETE', '/api/delete-car/' . $car->id);

        // then
        $response->assertStatus(Response::HTTP_NO_CONTENT);

        $carNotFound = false;
        try {
            $this->carRepository->findOrFail($car->id);
        } catch (ModelNotFoundException $e) {
            $carNotFound = true;
        }

        $this->assertTrue($carNotFound);
    }
}
