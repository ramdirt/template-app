<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia::render('Index');
});

Route::get('/helper', function () {
    return Inertia::render('Helper');
});

Route::fallback(function () {
    abort(404, 'Как ты сюда попал?');
});