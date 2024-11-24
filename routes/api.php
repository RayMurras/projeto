<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/example', function () {
    return response()->json(['message' => 'API route is working']);
});

Route::prefix('users')->group(function () {
    // Create a new user (POST /api/users)
    Route::post('/', [UserController::class, 'store']);

    // Get a single user by ID (GET /api/users/{id})
    Route::get('/{id}', [UserController::class, 'show']);

    // Update a user by ID (PUT /api/users/{id})
    Route::put('/{id}', [UserController::class, 'update']);

    // Delete a user by ID (DELETE /api/users/{id})
    Route::delete('/{id}', [UserController::class, 'destroy']);

    // Get all users (GET /api/users)
    Route::get('/', [UserController::class, 'index']);
});