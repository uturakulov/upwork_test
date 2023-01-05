<?php

use App\Http\Controllers\Api\Users\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/signup', [AuthController::class, 'signUp']);

Route::post('/signin', [AuthController::class, 'signIn']);
