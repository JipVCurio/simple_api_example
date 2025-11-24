<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiBookController;

Route::get('/books', [ApiBookController::class, 'index']);
Route::get('/books/{id}', [ApiBookController::class, 'show']);

Route::post('/books', [ApiBookController::class, 'store']);
Route::delete('/books/{id}', [ApiBookController::class, 'destroy']);