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

    // ======= UKM =========
    Route::get('/indikator/ukm', [UkmController::class, 'program'])->name('ukm.program');
    Route::get('/indikator/ukm/{id}/program', [UkmController::class, 'subprogram'])->name('program.detail');

    // ======== UKPP =======
    Route::get('/indikator/ukpp', [UkppController::class, 'pelayanan'])->name('ukpp.pelayanan');
    Route::get('/indikator/ukpp/{id}/pelayanan', [UkppController::class, 'subpelayanan'])->name('pelayanan.detail');

    Route::middleware('admin')->group(function () {
        Route::post('register', [RegisteredUserController::class, 'store'])->name('register');

        Route::get('/user-puskesmas', [AdminController::class, 'puskesmas'])->name('data.puskesmas');
        Route::get('/user-puskesmas/tambah-user', [AdminController::class, 'add_puskesmas'])->name('add.puskesmas');

        Route::get('/user-puskesmas/{id}/detail', [AdminController::class, 'detail_puskesmas'])->name('detail.puskesmas');
        Route::get('/user-puskesmas/{id}/detail/desa', [AdminController::class, 'detail_puskesmas_desa'])->name('detail.puskesmas.desa');
        Route::get('/user-puskesmas/{id}/detail/sdm', [AdminController::class, 'detail_puskesmas_sdm'])->name('detail.puskesmas.sdm');

        Route::get('/indikator/ukm/tambah', [UkmController::class, 'create_program'])->name('add.ukms');
        Route::post('/indikator/ukm/tambah', [UkmController::class, 'creating_program'])->name('add.ukm');
        Route::get('/indikator/ukm/{id}/edit', [UkmController::class, 'edit_program'])->name('edit.ukm');
        Route::patch('/indikator/ukm/{id}/edit', [UkmController::class, 'update_program'])->name('update.ukm');
        Route::delete('/indikator/ukm/{id}/delete', [UkmController::class, 'delete_program'])->name('delete.ukm');

        Route::get('/indikator/ukm/{id_program}/program/{id_sub}/detail/', [AdminController::class, 'detail_sub_ukm'])->name('program.detail.admin');

        // ========= UKPP ==========
        Route::get('/indikator/ukpp/{id_pelayanan}/pelayanan/{id_sub}/detail/', [AdminController::class, 'detail_sub_ukpp'])->name('pelayanan.detail.admin');
    });
    Route::middleware('puskesmas')->group(function () {
        Route::get('/detail-puskesmas', [PuskesmasController::class, 'index'])->name('detail.profil');

        //=========== UKM ============
        Route::post('/indikator/ukm/program/{id_sub}/data', [UkmController::class, 'creating_nilai'])->name('program.data.add');
        Route::get('/indikator/ukm/{id_program}/program/{id_sub}/data', [UkmController::class, 'nilai_ukm'])->name('program.detail.data');

        // ========== UKPP ===========
        Route::post('/indikator/ukpp/pelayanan/{id_sub}/data', [UkppController::class, 'creating_nilai'])->name('pelayanan.data.add');
        Route::get('/indikator/ukpp/{id_pelayanan}/program/{id_sub}/data', [UkppController::class, 'nilai_pelayanan'])->name('pelayanan.detail.data');
    });
});

require __DIR__ . '/auth.php';
