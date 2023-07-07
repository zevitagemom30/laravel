<?php

use App\Http\Controllers\V1\Pages\MunicipeController;
use Illuminate\Support\Facades\Route;

Route::prefix('municipes')->group(function () {
    Route::get('/buscar', [MunicipeController::class, 'getWithFilters']);
});
