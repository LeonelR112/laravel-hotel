<?php

use App\Http\Controllers\HabitacionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("homePage");
});

Route::get("editor/habitaciones", [HabitacionController::class, 'index']);
Route::get("editor/habitaciones/nuevo", [HabitacionController::class, 'create']);
Route::post("editor/habitaciones/guardar", [HabitacionController::class, 'store']);
Route::get("editor/habitaciones/modificar/{id_hab}", [HabitacionController::class, 'show']);
Route::put("editor/habitaciones/actualizar", [HabitacionController::class, 'edit']);
Route::delete('editor/habitaciones/borrar/{id_hab}', [HabitacionController::class, 'destroy']);