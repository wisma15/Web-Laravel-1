<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MahasiswaController;

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


Route::get('/', [PagesController::class, 'home']);
//Route::get('/frekuensi', [PagesController::class, 'frekuensi']);

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::post('/mahasiswa/create', [MahasiswaController::class, 'create']);
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);
Route::post('/mahasiswa/{id}/update', [MahasiswaController::class, 'update']);
Route::get('/mahasiswa/{id}/delete', [MahasiswaController::class, 'delete']);

Route::get('/frekuensi', [MahasiswaController::class, 'frekuensi']);
//Route::get('/frekuensi', [MahasiswaController::class, 'operations']);