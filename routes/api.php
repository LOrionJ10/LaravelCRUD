<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;





Route::controller(ProductController::class)->group(function () {
    Route::get('/product', 'index');
    Route::post('/product', 'store');
    Route::get('/product/{id}','show');
    Route::put('/productEditar/{id}', 'update');
    Route::delete('/product/{id}','destroy');
});