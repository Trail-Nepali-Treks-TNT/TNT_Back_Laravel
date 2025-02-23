<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Auth;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('logout', [AuthController::class, 'logout']);

// Protected route example
Route::middleware(['auth:api'])->get('/profile', function () {
    return response()->json(Auth::user());
});