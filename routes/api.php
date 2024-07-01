<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FetchBallDontLieData;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;

Route::get('import',[FetchBallDontLieData::class, 'handle']);

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['x-auth'])->group(function () {

    Route::get('/users', [UserController::class, 'all']);
    Route::post('/users/create', [UserController::class, 'create']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{id}', [UserController::class, 'findById']);
    Route::get('/users/name/{name}', [UserController::class, 'findByName']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::patch('/users/{id}', [UserController::class, 'edit']);
    Route::delete('/users/{id}', [UserController::class, 'destroy'])
    ->middleware(AdminMiddleware::class);

    Route::get('/teams', [TeamController::class, 'all']);
    Route::post('/teams', [TeamController::class, 'store']);
    Route::get('/teams/{id}', [TeamController::class, 'findById']);
    Route::get('/teams/name/{name}', [TeamController::class, 'findByName']);
    Route::patch('/teams/{id}', [TeamController::class, 'edit']);
    Route::put('/teams/{id}', [TeamController::class, 'update']);
    Route::delete('/teams/{id}', [TeamController::class, 'destroy'])
    ->middleware(AdminMiddleware::class);

    Route::get('/players', [PlayerController::class, 'index']);
    Route::post('/players', [PlayerController::class, 'store']);
    Route::get('/players/{id}', [PlayerController::class, 'findById']);
    Route::get('/players/name/{name}', [PlayerController::class, 'findByName']);
    Route::patch('/players/{id}', [PlayerController::class, 'edit']);
    Route::put('/players/{id}', [PlayerController::class, 'update']);
    Route::delete('/players/{id}', [PlayerController::class, 'destroy'])
    ->middleware(AdminMiddleware::class);

    Route::get('/games', [GameController::class, 'index']);
    Route::post('/games', [GameController::class, 'store']);
    Route::get('/games/{id}', [GameController::class, 'findById']);
    Route::put('/games/{id}', [GameController::class, 'update']);
    Route::patch('/games/{id}', [GameController::class, 'edit']);
    Route::delete('/games/{id}', [GameController::class, 'destroy'])
    ->middleware(AdminMiddleware::class);
});
