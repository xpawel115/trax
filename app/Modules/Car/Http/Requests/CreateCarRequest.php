<?php

namespace App\Modules\Car\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int    $year
 * @property string make
 * @property string model
 */
class CreateCarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'year'  => 'required|integer|min:1900|max:2021',
            'make'  => 'required|string|max:255',
            'model' => 'required|string|max:255'
        ];
    }
}
