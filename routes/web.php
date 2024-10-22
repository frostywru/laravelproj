<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
})
->group(function () {
    Route::get('/testing', function () {
        return view('testing');
    })->name('testing');
})
->group(function () {
    Route::get('/input', function () {
        return view('input');
    })->name('input');
});

