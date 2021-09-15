<?php

use App\Modules\Trip\Http\Controllers\TripController;

Route::get('get-trips', [TripController::class, 'getTrips']);
Route::post('add-trip', [TripController::class, 'create']);
