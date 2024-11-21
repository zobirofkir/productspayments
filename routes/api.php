<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource("/users", UserController::class);

Route::apiResource("/products", ProductController::class);


Route::post('/payments', [PaymentController::class, 'createPayment']);


