<?php

namespace App\Modules\Trip\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateTripRequest
 * @package App\Modules\Trip\Http\Requests
 * @property string $date
 * @property int    $car_id
 * @property double $miles
 */
class CreateTripRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'date'   => 'required|date', // ISO 8601 string
            'car_id' => 'required|integer',
            'miles'  => 'required|numeric:2'
        ];
    }
}
