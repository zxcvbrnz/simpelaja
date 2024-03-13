<?php

use App\Http\Controllers\apiControllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [apiControllers::class, 'index']);
Route::get('/ukm', [apiControllers::class, 'ukm']);
Route::get('/ukpp', [apiControllers::class, 'ukpp']);
Route::get('/manajemen-puskesmas', [apiControllers::class, 'manajemen']);
Route::get('/nasional-mutu', [apiControllers::class, 'nasionalmutu']);
Route::get('/{id_user}/ukm', [apiControllers::class, 'nilai_ukm']);
Route::get('/{id_user}/ukpp', [apiControllers::class, 'nilai_ukpp']);
Route::get('/{id_user}/manajemen-puskesmas', [apiControllers::class, 'nilai_manajemen']);
Route::get('/{id_user}/nasional-mutu', [apiControllers::class, 'nilai_nasionalmutu']);
