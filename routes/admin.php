<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CrearAnuncioController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CrearRolController;
use App\Http\Controllers\Admin\CrearCursoController;
use App\Http\Controllers\CustomRegisteredUserController;
use Laravel\Fortify\RoutePath;

Route::resource('/anuncios', CrearAnuncioController::class)->names('admin.anuncio');
Route::post('anuncios/{anuncio}', [CrearAnuncioController::class, 'update'])->name('admin.update');

route::resource('roles', CrearRolController::class)->names('admin.roles');

route::resource('cursos',CrearCursoController::class)->names('admin.cursos');

route::resource('users', UserController::class)->names('admin.users');

Route::middleware(['auth'])->group(function () {
    Route::get(RoutePath::for('register', '/register'), [CustomRegisteredUserController::class, 'create'])->name('register');
    Route::post(RoutePath::for('register', '/register'), [CustomRegisteredUserController::class, 'store']);
});