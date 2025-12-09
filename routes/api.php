<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\SerieController;

//Auth rotes
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

//Private routes - Table users
Route::get('/users', [UsersController::class, 'index'])->middleware(['auth:sanctum']);
Route::get('/users/{id}', [UsersController::class, 'show'])->middleware(['auth:sanctum']);
Route::post('/users', [UsersController::class, 'store']);
Route::put('/users/{id}', [UsersController::class, 'update'])->middleware(['auth:sanctum']);
Route::delete('/users/{id}', [UsersController::class, 'delete'])->middleware(['auth:sanctum']);

//Private routes - Table series
Route::get('/series', [SerieController::class, 'index'])->middleware(['auth:sanctum']);
Route::get('/series/{id}', [SerieController::class, 'show'])->middleware(['auth:sanctum']);
Route::post('/series', [SerieController::class, 'store'])->middleware(['auth:sanctum']);
Route::get('/series/{id}', [SerieController::class, 'update'])->middleware(['auth:sanctum']);
Route::delete('/series/{id}', [SerieController::class, 'delete'])->middleware(['auth:sanctum']);

//Private routes - Table seasons
Route::get('/seasons', [SeasonController::class, 'index'])->middleware(['auth:sanctum']);
Route::get('/seasons/{id}', [SeasonController::class, 'show'])->middleware(['auth:sanctum']);
Route::post('/seasons', [SeasonController::class, 'store'])->middleware(['auth:sanctum']);
Route::get('/seasons/{id}', [SeasonController::class, 'update'])->middleware(['auth:sanctum']);
Route::delete('/seasons/{id}', [SeasonController::class, 'delete'])->middleware(['auth:sanctum']);

//Private routes - Table episodes
Route::get('/episodes', [EpisodeController::class, 'index'])->middleware(['auth:sanctum']);
Route::get('/episodes/{id}', [EpisodeController::class, 'show'])->middleware(['auth:sanctum']);
Route::post('/episodes', [EpisodeController::class, 'store'])->middleware(['auth:sanctum']);
Route::get('/episodes/{id}', [EpisodeController::class, 'update'])->middleware(['auth:sanctum']);
Route::delete('/episodes/{id}', [EpisodeController::class, 'delete'])->middleware(['auth:sanctum']);

//Public routes - Dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

