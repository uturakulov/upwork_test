<?php

use App\Http\Controllers\Api\InterestCategory\InterestCategoryController;
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
        Route::get('/{id}', [InterestsController::class, 'show']);
        Route::get('/{id}/delete', [InterestsController::class, 'delete']);
        Route::post('/store', [InterestsController::class, 'store']);
        Route::post('/update', [InterestsController::class, 'update']);
});

Route::prefix('categories')
    ->middleware('auth:sanctum')
    ->group( function () {
        Route::get('/', [InterestCategoryController::class, 'index']);
        Route::post('/store', [InterestCategoryController::class, 'store']);
    });
