<?php

use App\Interfaces\Http\Controllers\Product\ListProductsController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/products', ListProductsController::class);
});
