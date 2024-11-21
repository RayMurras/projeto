<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Redirecionar '/' para '/home'
/* Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home'); */

//Rota de fallback (Tratamento de exceção do 404)
/* Route::fallback(function () {
    return redirect()->route('home');
}); */

/* Route::fallback(function () {
    return redirect()->route('user.register');
});
 */
