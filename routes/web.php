<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KotaController;

Route::get('/', function () {
    return view('layouts.master');
})->name('beranda');

// karyawannya doang yang manual

Route::resource('jabatan', JabatanController::class);


