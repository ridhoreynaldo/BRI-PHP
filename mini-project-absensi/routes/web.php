<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;//tambahan
use App\Http\Controllers\RedirectController;//tambahan
use App\Http\Controllers\AdminController;//tambahan
use App\Http\Controllers\PjController;//tambahan
use App\Http\Controllers\AsistenController;//tambahan
use App\Http\Controllers\MateriController;
use App\Http\Controllers\KelasController;
use App\Http\Middleware\ValidateReferer;//tambahan
use App\Models\Kelas;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//  jika user belum login
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);

});

// untuk admin, pj dan asisten
Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function() {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/presensi', [AdminController::class, 'presensi'])->name('presensi');
    Route::get('/checkin', [AdminController::class, 'checkin'])->name('checkin');
    Route::get('/riwayat', [AdminController::class, 'riwayat'])->name('riwayat');
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});

// untuk admin
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::post('/presensi', [AdminController::class, 'generate'])->name('generate');//INDEX INSERT

    Route::get('/data-asisten/index', [AdminController::class, 'index'])->name('data-asisten.index');//INDEX INSERT
    // Route::get('/data-asisten/create', [AdminController::class, 'create'])->name('data-asisten.create');
    Route::post('/data-asisten/index', [AdminController::class, 'store'])->name('data-asisten.store');//INSERT
    // Route::get('/data-asisten/edit/{id}', [AdminController::class, 'edit'])->name('data-asisten.edit');//INDEX UPDATE
    Route::put('/data-asisten/update/{id}', [AdminController::class, 'update'])->name('data-asisten.update');//UPDATE
    Route::delete('/data-asisten/{id}', [AdminController::class, 'destroy'])->name('data-asisten.destroy');//DELETE

    Route::get('/data-materi/index', [MateriController::class, 'index'])->name('data-materi.index');
    Route::post('/data-materi/index', [MateriController::class, 'store'])->name('data-materi.store');//INSERT
    Route::put('/data-materi/update/{id}', [MateriController::class, 'update'])->name('data-materi.update');//UPDATE
    Route::delete('/data-materi/{id}', [MateriController::class, 'destroy'])->name('data-materi.destroy');//DELETE

    Route::get('/data-kelas/index', [KelasController::class, 'index'])->name('data-kelas.index');
    Route::post('/data-kelas/index', [KelasController::class, 'store'])->name('data-kelas.store');//INSERT
    Route::put('/data-kelas/update/{id}', [KelasController::class, 'update'])->name('data-kelas.update');//UPDATE
    Route::delete('/data-kelas/{id}', [KelasController::class, 'destroy'])->name('data-kelas.destroy');//DELETE
});

// untuk pj
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    // Route::get('/pj', [PjController::class, 'index'])->name('dashboard');
});

// untuk asisten
Route::group(['middleware' => ['auth', 'checkrole:3']], function() {
    // Route::get('/asisten', [AsistenController::class, 'index'])->name('dashboard');
});

Route::post('/generate', [AdminController::class, 'index2'])->name('admin.index');//ini generate kode

// Route::post('/data-asisten', [App\Http\Controllers\AdminController::class, 'store'])->name('asistenSave');//tambahan