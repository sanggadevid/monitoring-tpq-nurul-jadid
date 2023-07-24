<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\GuruController;
use App\http\Controllers\KelasController;
use App\http\Controllers\SantriController;
use App\Http\Controllers\WalimuridController;
use App\Http\Controllers\HarianController;
use App\Http\Controllers\BulananController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SmesteranController;
 

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
route::middleware(['guest'])->group(function(){
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

route::middleware(['auth'])->group(function(){

    Route::get('/logout', [SesiController::class, 'logout']);
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/home/admin', [HomeController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('/home/guru', [HomeController::class, 'guru'])->middleware('userAkses:guru');
    Route::get('/home/walimurid', [HomeController::class, 'walimurid'])->middleware('userAkses:walimurid');
    
    // CRUD Data Pengguna
    Route::get('/pengguna', [PenggunaController::class, 'index']);
    Route::post('/pengguna/store', [PenggunaController::class, 'store']);
    Route::post('/pengguna/update/{id}', [PenggunaController::class, 'update']);
    Route::get('/pengguna/destroy/{id}', [PenggunaController::class, 'destroy']);
    
    // CRUD Data Guru
    Route::get('/guru', [GuruController::class, 'index']);
    Route::post('/guru/store', [GuruController::class, 'store']);
    Route::post('/guru/update/{id}', [GuruController::class, 'update']);
    Route::get('/guru/destroy/{id}', [GuruController::class, 'destroy']);
    
    // CRUD Data Kelas
    Route::get('/kelas', [KelasController::class, 'index']);
    Route::post('/kelas/store', [KelasController::class, 'store']);
    Route::post('/kelas/update/{id}', [KelasController::class, 'update']);
    Route::get('/kelas/destroy/{id}', [KelasController::class, 'destroy']);
    
    // CRUD Data Santri
    Route::get('/santri', [SantriController::class, 'index']);
    Route::post('/santri/store', [SantriController::class, 'store']);
    Route::post('/santri/update/{id}', [SantriController::class, 'update']);
    Route::get('/santri/destroy/{id}', [SantriController::class, 'destroy']);
    
    // CRUD Data Walimurid
    Route::get('/walimurid', [WalimuridController::class, 'index']);
    Route::post('/walimurid/store', [WalimuridController::class, 'store']);
    Route::post('/walimurid/update/{id}', [WalimuridController::class, 'update']);
    Route::get('/walimurid/destroy/{id}', [WalimuridController::class, 'destroy']);
    
    
    // CRUD Data Harian
    Route::get('/harian', [HarianController::class, 'index']);
    Route::post('/harian/store/{id}', [HarianController::class, 'store']);
    Route::post('/harian/update/{id}', [HarianController::class, 'update']);
    Route::get('/harian/destroy/{id}', [HarianController::class, 'destroy']);
    Route::get('/harian/tambah/{id}', [HarianController::class, 'tambah']);
    Route::get('/harian/detail/{id}', [HarianController::class, 'detail']);
    Route::get('/harian/edit/{id}', [HarianController::class, 'edit']);
    
    // CRUD Data Bulanan
    Route::get('/bulanan', [BulananController::class, 'index']);
    Route::post('/bulanan/store/{id}', [BulananController::class, 'store']);
    Route::post('/bulanan/update/{id}', [BulananController::class, 'update']);
    Route::get('/bulanan/destroy/{id}', [BulananController::class, 'destroy']);
    Route::get('/bulanan/tambah/{id}', [BulananController::class, 'tambah']);
    Route::get('/bulanan/detail/{id}', [BulananController::class, 'detail']);
    Route::get('/bulanan/edit/{id}', [BulananController::class, 'edit']);
    
    // CRUD Data Smesteran
    Route::get('/smesteran', [SmesteranController::class, 'index']);
    Route::get('/smesteran/store/', [SmesteranController::class, 'store']);
    Route::post('/smesteran/update/{id}', [SmesteranController::class, 'update']);
    Route::get('/smesteran/destroy/{id}', [SmesteranController::class, 'destroy']);
    Route::get('/smesteran/tambah/{id}', [SmesteranController::class, 'tambah']);
});
