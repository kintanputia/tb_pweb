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

Route::get('/register', function(){
    return view('auth.register');
});

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
Route::get('/tambah_peserta/{kelas}', [App\Http\Controllers\KrsController::class, 'create']);
Route::get('/dkelas/{kelas}', [App\Http\Controllers\KelasController::class, 'show'])->name('dkelas');
Route::post('/dkelas/{kelas}', [App\Http\Controllers\KrsController::class, 'store']);
Route::get('/hapus_peserta/{krs}', [App\Http\Controllers\KrsController::class, 'destroy']);

//
Route::get('/tkelas', [App\Http\Controllers\KelasController::class, 'create']);
Route::post('/tkelas', [App\Http\Controllers\KelasController::class, 'store']);
Route::get('/ukelas/{kelas}', [App\Http\Controllers\KelasController::class, 'edit']);
Route::post('/ukelas/{kelas}', [App\Http\Controllers\KelasController::class, 'update']);

use App\Http\Controllers\UsersController;
Route::get('/mahasiswa', [UsersController::class, 'index'])->name('mahasiswa');
Route::get('/dmahasiswa/{user}', [App\Http\Controllers\UsersController::class, 'show']);
Route::delete('/dmahasiswa/{user}', [App\Http\Controllers\UsersController::class, 'destroy']);
Route::get('/dmahasiswa/{user}/umahasiswa', [App\Http\Controllers\UsersController::class, 'edit']);
Route::patch('/dmahasiswa/{user}', [App\Http\Controllers\UsersController::class, 'update']);