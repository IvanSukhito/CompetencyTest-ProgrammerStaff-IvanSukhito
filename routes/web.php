<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KotaController;

Route::get('/', function () {
    return view('pages.beranda');
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
Route::get('/karyawan/{karyawan}', [KaryawanController::class, 'show'])->name('karyawan.show');
Route::get('/karyawan/{karyawan}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/{karyawan}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::delete('/karyawan/{karyawan}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

