<?php

use Illuminate\Support\Facades\Route;

// Rota principal retorna a view 'main_layout'
Route::get('/', function () {
    return view('utils.main_layout');
})->name('main');

// Rota de fallback retorna a mesma view 'main_layout'
Route::fallback(function () {
    return view('utils.main_layout');
});
