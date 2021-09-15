<?php

namespace App\Modules\Trip\DTO;

use App\Modules\Trip\Http\Requests\CreateTripRequest;

class TripData
{
    private $date;
    private $carId;
    private $miles;

    public function __construct(string $date, int $carId, float $miles)
    {
        $this->date = $date;
        $this->carId = $carId;
        $this->miles = $miles;
    }

    public static function fromRequest(CreateTripRequest $request): TripData
    {
        return new self(
            $request->date,
            $request->car_id,
            $request->miles
        );
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getCarId(): int
    {
        return $this->carId;
    }

    public function getMiles(): float
    {
        return $this->miles;
    }
}
