<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Alumno\FormController;

route::resource('/profile', FormController::class)->names('alumno');

Route::get('/boletin', function () {
    return view('alumno.boletin');
})->name('alumno.boletin');