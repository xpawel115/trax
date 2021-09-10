<?php

declare(strict_types=1);

namespace App\Modules\Car\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'id',
        'year',
        'make',
        'model'
    ];
}
