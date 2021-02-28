<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthorizationMiddleware;
use App\Http\Controllers\UserController;

Route::middleware([AuthorizationMiddleware::class])->prefix('user')->group(function () {
    Route::post('/insert', [UserController::class, 'insert']);
    Route::get('/list', [UserController::class, 'list']);
    Route::put('/update/{user}', [UserController::class, 'update']);
    Route::delete('/delete/{user}', [UserController::class, 'delete']);
    Route::delete('/destroy', [UserController::class, 'destroy']);
});
