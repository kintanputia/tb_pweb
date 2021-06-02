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
Route::get('/dkelas/{kelas}', [App\Http\Controllers\KelasController::class, 'show']);
Route::get('/tambah_peserta', [App\Http\Controllers\KrsController::class, 'create']);

//
Route::get('/tkelas', [App\Http\Controllers\KelasController::class, 'create']);
Route::get('/ukelas/{kelas}', [App\Http\Controllers\KelasController::class, 'edit']);

use App\Http\Controllers\UsersController;
Route::get('/mahasiswa', [UsersController::class, 'index'])->name('mahasiswa');
Route::get('/dmahasiswa/{user}', [App\Http\Controllers\UsersController::class, 'show']);
Route::delete('/dmahasiswa/{user}', [App\Http\Controllers\UsersController::class, 'destroy']);
Route::get('/dmahasiswa/{user}/umahasiswa', [App\Http\Controllers\UsersController::class, 'edit']);
Route::patch('/dmahasiswa/{user}', [App\Http\Controllers\UsersController::class, 'update']);