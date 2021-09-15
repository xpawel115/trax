<?php

namespace App\Modules\Trip\Models;

use App\Modules\Car\Models\Car;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trip extends Model
{
    protected $fillable = [
        'id',
        'car_id',
        'date',
        'miles'
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class)->withDefault();
    }

    public function getMilesAttribute($value)
    {
        return round($value, 2);
    }
}
