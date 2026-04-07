<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\KategoriController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/login', fn() => view('auth.login'))->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard',
        [UserController::class, 'adminDashboard']
    )->name('admin.dashboard');

    Route::get('/siswa/dashboard',
        [UserController::class, 'siswaDashboard']
    )->name('siswa.dashboard');

    Route::get('/siswa/aspirasi/create',
        [AspirasiController::class, 'create']
    )->name('aspirasi.create');

    Route::post('/siswa/aspirasi',
        [AspirasiController::class, 'store']
    )->name('aspirasi.store');

    Route::post('/feedback',
        [FeedbackController::class, 'store']
    )->name('feedback.store');

    Route::get('/admin/kategori',
        [KategoriController::class, 'index']
    )->name('kategori.index');

    Route::post('/admin/kategori',
        [KategoriController::class, 'store']
    )->name('kategori.store');

    Route::patch('/admin/aspirasi/{id}/status',
        [AspirasiController::class, 'updateStatus']
    )->name('admin.aspirasi.updateStatus');

    Route::get('/siswa/aspirasi/{id}/edit',
        [AspirasiController::class, 'edit']
    )->name('aspirasi.edit');

    Route::put('/siswa/aspirasi/{id}',
        [AspirasiController::class, 'update']
    )->name('aspirasi.update');

    Route::delete('/siswa/aspirasi/{id}',
        [AspirasiController::class, 'destroy']
    )->name('aspirasi.destroy');

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');
});
