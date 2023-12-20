<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MajalahController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('showMahasiswa', [MahasiswaController::class, 'show']);
Route::post('addMahasiswa', [MahasiswaController::class, 'create']);
Route::put('updateMahasiswa/{id}', [MahasiswaController::class, 'update']);
Route::delete('deleteMahasiswa/{id}', [MahasiswaController::class, 'destroy']);

Route::get('showMajalah', [MajalahController::class, 'show']);
Route::post('addMajalah', [MajalahController::class, 'create']);
Route::put('updateMajalah/{id}', [MajalahController::class, 'update']);
Route::delete('deleteMajalah/{id}', [MajalahController::class, 'destroy']);