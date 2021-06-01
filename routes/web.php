<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/mahasiswa', function () {
        return view('mahasiswa');
    })->name('mahasiswa')->middleware(['auth', 'ceklevel:admin']);

// Route::get('/kelas', function () {
//         return view('kelas');
//     })->name('kelas')->middleware(['auth', 'ceklevel:admin']);

Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'ceklevel:admin,mahasiswa'])->name('dashboard');
require __DIR__.'/auth.php';

use App\Http\Controllers\KelasController;
Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');

//Detail Kelas
Route::get('/dkelas/{kelas}', [App\Http\Controllers\KelasController::class, 'show']);
Route::get('/tambah_peserta', [App\Http\Controllers\KrsController::class, 'create']);

