<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/landing', function () {
    return view('landing');
})->name('landing');