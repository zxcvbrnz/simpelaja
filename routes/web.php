<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PuskesmasController;
use App\Http\Controllers\UkmController;
use App\Http\Controllers\UkppController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/indikator/ukm', [UkmController::class, 'program'])->name('ukm.program');
    Route::get('/indikator/ukm/{id}/program', [UkmController::class, 'subprogram'])->name('program.detail');

    Route::get('/indikator/ukpp', [UkppController::class, 'pelayanan'])->name('ukpp.pelayanan');

    Route::middleware('admin')->group(function () {
        Route::get('/user-puskesmas', [AdminController::class, 'puskesmas'])->name('data.puskesmas');
        Route::get('/indikator/ukm/tambah', [AdminController::class, 'add_ukm'])->name('add.ukms');
        Route::get('/user-puskesmas/tambah-user', [UkmController::class, 'create_program'])->name('add.puskesmas');
        Route::post('register', [RegisteredUserController::class, 'store'])->name('register');
        Route::get('/user-puskesmas/{id}/detail', [AdminController::class, 'detail_puskesmas'])->name('detail.puskesmas');
        Route::get('/user-puskesmas/{id}/detail/desa', [AdminController::class, 'detail_puskesmas_desa'])->name('detail.puskesmas.desa');
        Route::get('/user-puskesmas/{id}/detail/sdm', [AdminController::class, 'detail_puskesmas_sdm'])->name('detail.puskesmas.sdm');
        Route::get('/indikator/ukm/{id_program}/program/{id_sub}/detail/', [AdminController::class, 'detail_sub_ukm'])->name('program.detail.admin');
    });
    Route::middleware('puskesmas')->group(function () {
        Route::post('/indikator/ukm/program/{id_sub}/data', [UkmController::class, 'creating_nilai'])->name('program.data.add');
        Route::get('/detail-puskesmas', [PuskesmasController::class, 'index'])->name('detail.profil');
        Route::get('/indikator/ukm/{id_program}/program/{id_sub}/data', [UkmController::class, 'nilai_ukm'])->name('program.detail.data');
    });
});

require __DIR__ . '/auth.php';
