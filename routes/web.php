<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HabitacionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("homePage");
});


Route::get('usuarios', [UsuarioController::class, 'index'])->name("usuarios.index");
Route::get('usuarios/create', [UsuarioController::class, 'create'])->name("usuarios.create");
Route::post('usuarios/store', [UsuarioController::class, 'store'])->name("usuarios.store");
Route::get('usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name("usuarios.edit");
Route::put('usuarios/{usuario}', [UsuarioController::class, 'update'])->name("usuarios.update");
Route::delete('usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name("usuarios.destroy");


Route::get("editor/habitaciones", [HabitacionController::class, 'index']);
Route::get("editor/habitaciones/nuevo", [HabitacionController::class, 'create']);
Route::post("editor/habitaciones/guardar", [HabitacionController::class, 'store']);
Route::get("editor/habitaciones/modificar/{id_hab}", [HabitacionController::class, 'show']);
Route::put("editor/habitaciones/actualizar", [HabitacionController::class, 'edit']);
Route::delete('editor/habitaciones/borrar/{id_hab}', [HabitacionController::class, 'destroy']);
