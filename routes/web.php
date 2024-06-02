<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/JadwalKelas',[AdminController::class,'jadwalKelas'])->name('JadwalKelas');
Route::post('/store',[AdminController::class,'store'])->name('store');
Route::delete('/delete/{id}',[AdminController::class,'delete'])->name('jadwal.delete');

Route::get('/detail/{id}',[AdminController::class,'detail'])->name('jadwal.detail');

