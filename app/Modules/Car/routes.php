<?php

use App\Modules\Car\Http\Controllers\CarController;

Route::group(['middleware' => 'auth:api'], static function () {
    Route::get('get-cars', [CarController::class, 'getCars']);
    Route::get('get-car/{id}', [CarController::class, 'show']);
    Route::post('add-car', [CarController::class, 'create']);
    Route::delete('delete-car/{id}', [CarController::class, 'destroy']);
});
