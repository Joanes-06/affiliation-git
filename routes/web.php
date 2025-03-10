<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('welcome');
});
Route::get('/accueil', function () {
    return view('front.accueil');
});
Route::get('/plan', function () {
    return view('front.plan');
});

Route::get('/indet', function () {
    return view('front.index');
});
Route::get('/dashboard_accueil', function () {
    return view('front.dashboard_accueil');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
