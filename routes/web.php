<?php

use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenerateLaporanPdf;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\KategoriInventarisController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::post('/login', [AuthController::class, "AuthLogin"]);
Route::get('/logout', [AuthController::class, "Logout"]);

Route::get('/dashboard', [DashboardController::class, "Index"])->middleware('auth');
Route::controller(KategoriInventarisController::class)->middleware('auth')->group(function () {
    Route::get('/kategori', 'GetAll');
    Route::post('/addkategori', 'AddData');
    Route::post('/updatekategori', 'UpdateData');
    Route::get('/deletekategori/{id_kategori}', 'DeleteData');
});

Route::controller(InventarisController::class)->middleware('auth')->group(function () {
    Route::get('/barang', 'GetAll');
    Route::post('/addbarang', 'AddBarang');
    Route::post('/updatebarang', 'UpdateBarang');
    Route::get('/deletebarang/{id_barang}', 'DeleteBarang');
});
Route::controller(UserController::class)->middleware('auth')->group(function () {
    Route::get('/users', 'GetAll');
    Route::post('/adduser', 'AddUser');
    Route::post('/updateuser', 'UpdateUser');
    Route::get('/deleteuser/{id}', 'DeleteUser');
});
Route::get('/show_pdf', [GenerateLaporanPdf::class, 'ShowPdf'])->middleware('auth');
Route::get('/generate_pdf', [GenerateLaporanPdf::class, 'Index'])->middleware('auth');
