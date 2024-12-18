<?php

use App\Http\Controllers\UserController;
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


Route::get('/login',[AdminController::class, 'login'])->name('login');
Route::post('/postlogin',[AdminController::class, 'postlogin'])->name('postlogin');
Route::get('/detailpertanyaan/{id}',[AdminController::class, 'detailpertanyaan'])->name('detailpertanyaan');
Route::put('/jawaban/{id}',[AdminController::class, 'jawaban'])->name('jawaban');

Route::get('/pertanyaan', [AdminController::class, 'pertanyaan'])->name('pertanyaan');

Route::post('/uploads', [AdminController::class, 'uploadPost'])->name('modul.upload');
Route::delete('/delete{id}', [AdminController::class, 'deleteModul'])->name('modul.delete');

Route::get('/JadwalKelas', [AdminController::class, 'jadwalKelas'])->name('JadwalKelas');
Route::post('/store', [AdminController::class, 'store'])->name('store');
Route::get('/detail/{id}', [AdminController::class, 'detail'])->name('jadwal.detail');
Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('jadwal.delete');
Route::put('/update/{id}', [AdminController::class, 'update'])->name('jadwal.update');

Route::post('/postmurid/{id}', [AdminController::class, 'postmurid'])->name('postmurid');
Route::delete('/deletemurid/{id}', [AdminController::class, 'deletemurid'])->name('deletemurid');

Route::get('/upload', [AdminController::class, 'upload'])->name('upload');

Route::prefix('/soal')->name('soal.')->namespace('App\Http\Controllers\soal')->group(function(){
    Route::get('edit2/{id}', 'SoalController@edit2')->name('edit2'); // buat ke page upload file
    Route::resource('/', 'SoalController');
});

Route::get('/iuran',[AdminController::class, 'iuran'])->name('iuran');
Route::post('/postiuran', [AdminController::class, 'postiuran'])->name('postiuran');
