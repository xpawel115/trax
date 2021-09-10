<?php

namespace App\Modules\Car\DTO;

use App\Modules\Car\Http\Requests\CreateCarRequest;

class CarData
{
    private $year;
    private $make;
    private $model;

    /**
     * CarData constructor.
     * @param int    $year
     * @param string $make
     * @param string $model
     */
    public function __construct(int $year, string $make, string $model)
    {
        $this->year = $year;
        $this->make = $make;
        $this->model = $model;
    }

    public static function fromRequest(CreateCarRequest $request): CarData
    {
        return new self(
            $request->year,
            $request->make,
            $request->model
        );
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getMake(): string
    {
        return $this->make;
    }

    public function getModel(): string
    {
        return $this->model;
    }
}
