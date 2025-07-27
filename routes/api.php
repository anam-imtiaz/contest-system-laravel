<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContestQuestionController;

Route::post('login', [AuthController::class, 'login']);
Route::group([
    'middleware' => 'auth:api',
], function () {
   
    Route::post('logout', [AuthController::class, 'logout']);
    Route::group(['prefix' => 'users'], function () {
        Route::get('get', [AuthController::class, 'getUser']);
        Route::get('all', [UserController::class, 'index']);
        Route::post('signup', [UserController::class, 'store']);
        Route::get('show/{id}', [UserController::class, 'show']);
        Route::post('update/{id}', [UserController::class, 'update']);
        Route::delete('destroy/{id}', [UserController::class, 'destroy']);
    });
    Route::group(['prefix' => 'contests'], function () {
        Route::get('all', [ContestController::class, 'index']);
        Route::post('store', [ContestController::class, 'store']);
        Route::get('show/{id}', [ContestController::class, 'show']);
        Route::post('update/{id}', [ContestController::class, 'update']);
        Route::delete('destroy/{id}', [ContestController::class, 'destroy']);
        Route::get('question', [ContestQuestionController::class, 'index']);
        Route::post('question/store', [ContestQuestionController::class, 'store']);
        Route::get('question/show/{id}', [ContestQuestionController::class, 'show']);
        Route::post('question/update/{id}', [ContestQuestionController::class, 'update']);
        Route::delete('question/destroy/{id}', [ContestQuestionController::class, 'destroy']);
    });
    
});
