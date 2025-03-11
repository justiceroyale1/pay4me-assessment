<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::name('api.')->group(function () {
    Route::get('/up', function () {
        return response()->json(['status' => 'ok']);
    })->name('up');


    Route::apiResource('products', ProductController::class)
        ->only(['index', 'store', 'show']);
});
