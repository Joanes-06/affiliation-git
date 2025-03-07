<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
<<<<<<< HEAD
    return view('accueil');
=======
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
>>>>>>> 97869372a509238160abe0b71644a30ed5421f9f
});

Route::get('/okk', function () {
    return view('preview');
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
