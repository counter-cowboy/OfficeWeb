<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::resource('products', ProductController::class)
->except(['edit', 'destroy', 'update']);


//Route::get('/products/create', [ProductController::class, 'create'])
//    ->name('product.create');
//
//Route::post('/products', [ProductController::class, 'store'])
//    ->name('product.store');
//
//Route::get('/products', [ProductController::class, 'index'])
//    ->name('product.index');
//
//Route::get('/products/{product}', [ProductController::class, 'show'])
//    ->name('product.show');

