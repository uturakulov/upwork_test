<?php

use App\Http\Controllers\Api\UserInterest\InterestsController;
use App\Http\Controllers\Api\Users\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'signUp']);

Route::post('/login', [AuthController::class, 'signIn']);

Route::prefix('interests')
    ->middleware('auth:sanctum')
    ->group( function () {
        Route::get('/', [InterestsController::class, 'index']);
});
