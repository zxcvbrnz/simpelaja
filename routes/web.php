<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\ManajemenController;
use App\Http\Controllers\NasionalmutuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PuskesmasController;
use App\Http\Controllers\SdmController;
use App\Http\Controllers\UkmController;
use App\Http\Controllers\UkppController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
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
    return redirect('/login');
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
    Route::get('/indikator/ukm/{id}/program', function ($id, Request $request) {
        if (auth()->user()->role == 'admin') {
            return app(AdminController::class)->subprogram($id);
        } else {
            return app(UkmController::class)->subprogram($request, $id);
        }
    })->name('program.detail');

    // ======== UKPP =======
    Route::get('/indikator/ukpp', [UkppController::class, 'pelayanan'])->name('ukpp.pelayanan');
    Route::get('/indikator/ukpp/{id}/pelayanan', function ($id, Request $request) {
        if (auth()->user()->role == 'admin') {
            return app(AdminController::class)->subpelayanan($id);
        } else {
            return app(UkppController::class)->subpelayanan($request, $id);
        }
    })->name('pelayanan.detail');

    // Manajemen
    Route::get('indikator/manajemen-puskesmas', [ManajemenController::class, 'manajemen'])->name('manajemen.index');
    Route::get('/indikator/manajemen-puskesmas/{id}/manajemen', function ($id, Request $request) {
        if (auth()->user()->role == 'admin') {
            return app(AdminController::class)->submanajemen($id);
        } else {
            return app(ManajemenController::class)->submanajemen($request, $id);
        }
    })->name('manajemen.detail');

    // Nasional Mutu
    Route::get('indikator/nasional-mutu', [NasionalmutuController::class, 'mutu'])->name('nasionalmutu.index');

    Route::middleware('admin')->group(function () {
        Route::post('register', [RegisteredUserController::class, 'store'])->name('register');

        Route::get('/user-puskesmas', [AdminController::class, 'puskesmas'])->name('data.puskesmas');
        Route::delete('/user-puskesmas', [AdminController::class, 'delete_puskesmas'])->name('delete.puskesmas');
        Route::get('/user-puskesmas/tambah-user', [AdminController::class, 'add_puskesmas'])->name('add.puskesmas');

        Route::get('/user-puskesmas/{id}/detail', [AdminController::class, 'detail_puskesmas'])->name('detail.puskesmas');
        Route::get('/user-puskesmas/{id}/detail/desa', [AdminController::class, 'detail_puskesmas_desa'])->name('detail.puskesmas.desa');
        Route::get('/user-puskesmas/{id}/detail/sdm', [AdminController::class, 'detail_puskesmas_sdm'])->name('detail.puskesmas.sdm');

        // ======= UKM ============
        Route::get('/indikator/ukm/tambah', [UkmController::class, 'create_program'])->name('add.ukms');
        Route::post('/indikator/ukm/tambah', [UkmController::class, 'creating_program'])->name('add.ukm');
        Route::get('/indikator/ukm/{id}/edit', [UkmController::class, 'edit_program'])->name('edit.ukm');
        Route::patch('/indikator/ukm/{id}/edit', [UkmController::class, 'update_program'])->name('update.ukm');
        Route::delete('/indikator/ukm', [UkmController::class, 'delete_program'])->name('delete.ukm');

        Route::get('/indikator/ukm/{id}/program/tambah', [UkmController::class, 'create_subprogram'])->name('add.subprogram');
        Route::post('/indikator/ukm/{id}/program/tambah', [UkmController::class, 'creating_subprogram'])->name('create.subprogram');
        Route::get('/indikator/ukm/{id}/program/{id_sub}/edit', [UkmController::class, 'edit_subprogram'])->name('edit.subprogram');
        Route::patch('/indikator/ukm/{id}/program/{id_sub}/edit', [UkmController::class, 'update_subprogram'])->name('update.subprogram');
        Route::delete('/indikator/ukm/{id}/program', [UkmController::class, 'delete_subprogram'])->name('delete.subprogram');

        Route::get('/indikator/ukm/{id_program}/program/{id_sub}/detail/', [AdminController::class, 'detail_sub_ukm'])->name('program.detail.admin');
        Route::get('/indikator/ukm/{id_program}/program/{id_sub}/detail/{id_user}', [AdminController::class, 'nilai_ukm'])->name('program.detail.admin.user');

        // ========= UKPP ==========
        Route::get('/indikator/ukpp/tambah', [UkppController::class, 'create_pelayanan'])->name('add.ukpps');
        Route::post('/indikator/ukpp/tambah', [UkppController::class, 'creating_pelayanan'])->name('add.ukpp');
        Route::get('/indikator/ukpp/{id}/edit', [UkppController::class, 'edit_pelayanan'])->name('edit.ukpp');
        Route::patch('/indikator/ukpp/{id}/edit', [UkppController::class, 'update_pelayanan'])->name('update.ukpp');
        Route::delete('/indikator/ukpp', [UkppController::class, 'delete_pelayanan'])->name('delete.ukpp');

        Route::get('/indikator/ukpp/{id}/pelayanan/tambah', [UkppController::class, 'create_subpelayanan'])->name('add.subpelayanan');
        Route::post('/indikator/ukpp/{id}/pelayanan/tambah', [UkppController::class, 'creating_subpelayanan'])->name('create.subpelayanan');
        Route::get('/indikator/ukpp/{id}/pelayanan/{id_sub}/edit', [UkppController::class, 'edit_subpelayanan'])->name('edit.subpelayanan');
        Route::patch('/indikator/ukpp/{id}/pelayanan/{id_sub}/edit', [UkppController::class, 'update_subpelayanan'])->name('update.subpelayanan');
        Route::delete('/indikator/ukpp/{id}/pelayanan', [UkppController::class, 'delete_subpelayanan'])->name('delete.subpelayanan');

        Route::get('/indikator/ukpp/{id_pelayanan}/pelayanan/{id_sub}/detail/', [AdminController::class, 'detail_sub_ukpp'])->name('pelayanan.detail.admin');
        Route::get('/indikator/ukpp/{id_pelayanan}/pelayanan/{id_sub}/detail/{id_user}', [AdminController::class, 'nilai_ukpp'])->name('pelayanan.detail.admin.user');

        // Manajemen
        Route::get('/indikator/manajemen-puskesmas/tambah', [ManajemenController::class, 'create_manajemen'])->name('manajemen.create');
        Route::post('/indikator/manajemen-puskesmas/tambah', [ManajemenController::class, 'creating_manajemen'])->name('manajemen.creating');
        Route::get('/indikator/manajemen-puskesmas/{id}/edit', [ManajemenController::class, 'edit_manajemen'])->name('manajemen.edit');
        Route::patch('/indikator/manajemen-puskesmas/{id}/edit', [ManajemenController::class, 'update_manajemen'])->name('manajemen.update');
        Route::delete('/indikator/manajemen-puskesmas', [ManajemenController::class, 'delete_manajemen'])->name('manajemen.delete');

        Route::get('/indikator/manajemen-puskesmas/{id}/manajemen/tambah', [ManajemenController::class, 'create_submanajemen'])->name('submanajemen.create');
        Route::post('/indikator/manajemen-puskesmas/{id}/manajemen/tambah', [ManajemenController::class, 'creating_submanajemen'])->name('submanajemen.creating');
        Route::get('/indikator/manajemen-puskesmas/{id}/manajemen/{id_sub}/edit', [ManajemenController::class, 'edit_submanajemen'])->name('submanajemen.edit');
        Route::patch('/indikator/manajemen-puskesmas/{id}/manajemen/{id_sub}/edit', [ManajemenController::class, 'update_submanajemen'])->name('submanajemen.update');
        Route::delete('/indikator/manajemen-puskesmas/{id}/manajemen', [ManajemenController::class, 'delete_submanajemen'])->name('submanajemen.delete');

        Route::get('/indikator/manajemen-puskesmas/{id_manajemen}/manajemen/{id_sub}/detail/', [AdminController::class, 'detail_sub_manajemen'])->name('manajemen.detail.admin');
        Route::get('/indikator/manajemen-puskesmas/{id_manajemen}/manajemen/{id_sub}/detail/{id_user}', [AdminController::class, 'nilai_manajemen'])->name('manajemen.detail.admin.user');

        // Nasional Mutu
        Route::get('/indikator/nasional-mutu/tambah', [NasionalmutuController::class, 'create_mutu'])->name('mutu.create');
        Route::post('/indikator/nasional-mutu/tambah', [NasionalmutuController::class, 'creating_mutu'])->name('mutu.creating');
        Route::get('/indikator/nasional-mutu/{id}/edit', [NasionalmutuController::class, 'edit_mutu'])->name('mutu.edit');
        Route::patch('/indikator/nasional-mutu/{id}/edit', [NasionalmutuController::class, 'update_mutu'])->name('mutu.update');
        Route::delete('/indikator/nasional-mutu', [NasionalmutuController::class, 'delete_mutu'])->name('mutu.delete');
    });

    Route::middleware('puskesmas')->group(function () {
        Route::get('/detail-puskesmas', [PuskesmasController::class, 'index'])->name('detail.profil');
        Route::patch('/detail-puskesmas', [PuskesmasController::class, 'update_profil'])->name('update.profil');

        // Desa
        Route::get('/detail-puskesmas/desa', [DesaController::class, 'desa'])->name('desa');
        Route::get('/detail-puskesmas/desa/tambah', [DesaController::class, 'create_desa'])->name('desa.create');
        Route::post('/detail-puskesmas/desa/tambah', [DesaController::class, 'creating_desa'])->name('desa.creating');
        Route::get('/detail-puskesmas/desa/{id}/edit', [DesaController::class, 'edit_desa'])->name('desa.edit');
        Route::patch('/detail-puskesmas/desa/{id}/edit', [DesaController::class, 'editing_desa'])->name('desa.update');
        Route::delete('/detail-puskesmas/desa', [DesaController::class, 'delete_desa'])->name('desa.delete');

        // SDM
        Route::get('/detail-puskesmas/sdm', [SdmController::class, 'sdm'])->name('sdm');
        Route::get('/detail-puskesmas/sdm/tambah', [SdmController::class, 'create_sdm'])->name('sdm.create');
        Route::post('/detail-puskesmas/sdm/tambah', [SdmController::class, 'creating_sdm'])->name('sdm.creating');
        Route::get('/detail-puskesmas/sdm/{id}/edit', [SdmController::class, 'edit_sdm'])->name('sdm.edit');
        Route::patch('/detail-puskesmas/sdm/{id}/edit', [SdmController::class, 'editing_sdm'])->name('sdm.update');
        Route::delete('/detail-puskesmas/sdm', [SdmController::class, 'delete_sdm'])->name('sdm.delete');

        //=========== UKM ============
        Route::post('/indikator/ukm/{id}/program', [UkmController::class, 'subprogram'])->name('filter.subprogram');
        Route::post('/indikator/ukm/program/{id_sub}/data', [UkmController::class, 'creating_nilai'])->name('program.data.add');
        Route::get('/indikator/ukm/{id_program}/program/{id_sub}/data', [UkmController::class, 'nilai_ukm'])->name('program.detail.data');
        Route::get('ukm/export/{start_time}/{end_time}/{id_ukm}', [UkmController::class, 'export'])->name('export.ukm');

        // ========== UKPP ===========
        Route::post('/indikator/ukpp/{id}/pelayanan', [UkmController::class, 'subpelayanan'])->name('filter.pelayanan');
        Route::post('/indikator/ukpp/pelayanan/{id_sub}/data', [UkppController::class, 'creating_nilai'])->name('pelayanan.data.add');
        Route::get('/indikator/ukpp/{id_pelayanan}/pelayanan/{id_sub}/data', [UkppController::class, 'nilai_pelayanan'])->name('pelayanan.detail.data');

        // Manajemen
        Route::post('/indikator/manajemen-puskesmas/manajemen/{id_sub}/data', [ManajemenController::class, 'creating_nilai'])->name('manajemen.data.add');
        Route::get('/indikator/manajemen-puskesmas/{id_manajemen}/manajemen/{id_sub}/data', [ManajemenController::class, 'nilai_manajemen'])->name('manajemen.detail.data');
    });
});

require __DIR__ . '/auth.php'; { {
    }
}
