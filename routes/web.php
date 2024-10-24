<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("homePage");
});


Route::get('usuarios', [UsuarioController::class, 'index'])->name("usuarios.index");
Route::get('usuarios/create', [UsuarioController::class, 'create'])->name("usuarios.create");
Route::post('usuarios/store', [UsuarioController::class, 'store'])->name("usuarios.store");
Route::get('usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name("usuarios.edit");
Route::put('usuarios/{usuario}', [UsuarioController::class, 'update'])->name("usuarios.update");