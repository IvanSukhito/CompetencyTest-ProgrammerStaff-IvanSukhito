<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KotaController;

Route::get('/', function () {
    return view('layouts.master');
})->name('beranda');

// karyawannya doang yang manual

Route::resource('jabatan', JabatanController::class)->parameters([
    'jabatan' => 'jabatan' 
]);
Route::resource('kota', KotaController::class)->parameters([
    'kota' => 'kota' 
]);;

Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('/karyawan/dataTable', [KaryawanController::class, 'dataTable'])->name('ajax.karyawan.dataTable');
Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
Route::post('/karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');

