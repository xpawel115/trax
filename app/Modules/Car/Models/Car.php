<?php

namespace App\Modules\Car\Models;

use App\Modules\Trip\Models\Trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Car
 * @package App\Modules\Car\Models
 * @property int    $id
 * @property int    $year
 * @property string $make
 * @property string $model
 */
class Car extends Model
{
    protected $fillable = [
        'id',
        'year',
        'make',
        'model'
    ];

    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class);
    }
}
