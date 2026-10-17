<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\KopdesController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MataPelajaranController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('murid', MuridController::class);
Route::resource('kopdes', KopdesController::class);
Route::resource('mata-pelajaran', MataPelajaranController::class)->names([
    'index' => 'mapel.index',
    'create' => 'mapel.create',
    'store' => 'mapel.store',
    'show' => 'mapel.show',
    'edit' => 'mapel.edit',
    'update' => 'mapel.update',
    'destroy' => 'mapel.destroy',
]);
Route::resource('guru', GuruController::class);