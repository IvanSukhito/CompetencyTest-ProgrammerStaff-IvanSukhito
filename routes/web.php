<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KotaController;

Route::get('/', function () {
    return view('pages.beranda');
})->name('beranda');


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

// function kalkulasi tanggal
Route::post('/kalkulasi', function (Request $request){
    
    $date1 = $request->date_1;
    $date2 = $request->date_2;

    $hasil = kalkulasiTanggal($date1, $date2);
    return view('pages.beranda', ['hasil' => $hasil]);
})->name('kalkulasi-tanggal');
