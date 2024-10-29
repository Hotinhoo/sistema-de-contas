<?php

use App\Http\Controllers\ContasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () { // Criação de grupo dentro do middleware

    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/bills', 'bills')->name('user-bills');
    Route::get('/bill/{conta}', [ContasController::class, 'show'])->name('bill-details');

});

// Rotas sem verificação de E-mail
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* Gerenciar Contas */

    Route::post('/conta', [ContasController::class, 'store'])->name('store-bill'); // Criar nova conta
    Route::put('/conta/{conta}', [ContasController::class, 'update'])->name('update-bill'); // Atualizar conta
    Route::delete('/conta/{conta}', [ContasController::class, 'destroy'])->name('destroy-bill'); // Excluir conta

});

require __DIR__ . '/auth.php';
