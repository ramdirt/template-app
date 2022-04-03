<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return Inertia::render('Index');
});

Route::middleware('guest')->group(function () {
    Route::get('/signup', [UserController::class, 'signup']);
    Route::post('/signup', [UserController::class, 'store']);
    Route::get('/login', [UserController::class, 'index']);
    Route::post('/login', [UserController::class, 'login']);
});

Route::get('/helper', function () {
    return Inertia::render('Helper');
});
Route::match(['get', 'post'], '/logout', [UserController::class, 'logout'])->middleware('auth');

Route::fallback(function () {
    abort(404, 'Как ты сюда попал?');
});