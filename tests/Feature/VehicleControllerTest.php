<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Vehicle;
use App\Car;
use App\Truck;
class VehicleControllerTest extends TestCase
{

    use RefreshDatabase;
    /**
     * It Should Load All Kind Of Vehicles on /
     * @test
     */
    public function it_should_load_all_kinds_of_vehicles()
    {
        //Given
        $vehicle = factory(Vehicle::class)->create();
        $car = factory(Car::class)->create();
        $truck = factory(Truck::class)->create();
        //When
        $response = $this->get('/vehicles');
        //Then
        $response->assertSeeText('Car');
        $response->assertSeeText('Truck');
        $response->assertSeeText('Vehicle');
    }

}
