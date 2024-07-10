<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\DiagnosisGejalaController;
use App\Http\Controllers\ClientController;


Route::middleware('belum_login')->group(function () {
    Route::get('/',[DashboardController::class,'login'])->name('login');
    Route::get('/register',[DashboardController::class,'register'])->name('register');
    Route::post('/register-akun',[DashboardController::class,'registerakun'])->name('register.akun');
    Route::post('/masuk-akun',[DashboardController::class,'aksiLogin'])->name('aksilogin');

});

Route::middleware('sudah_login')->group(function () {
    Route::get('/dashboard',[DashboardController::class,'home'])->name('home');
    Route::get('/data',[DashboardController::class,'chart1'])->name('chart1');
    Route::get('/logout',[DashboardController::class,'logout'])->name('logout');

    Route::post('/user-tambah/{id?}',[UserController::class,'store'])->name('user.tambah');
    Route::get('/user-hapus/{id?}',[UserController::class,'destroy'])->name('user.hapus');
    Route::get('/user',[UserController::class,'index'])->name('user.index');
    Route::get('/user-tabel',[UserController::class,'tabel'])->name('user.tabel');

    Route::get('/gejala',[GejalaController::class,'index'])->name('gejala.index');
    Route::get('/gejala-data',[GejalaController::class,'data'])->name('gejala.data');
    Route::post('/gejala-tambah/{id?}',[GejalaController::class,'store'])->name('gejala.tambah');
    Route::get('/gejala-hapus/{id?}',[GejalaController::class,'destroy'])->name('gejala.hapus');

    Route::get('/diagnosis',[DiagnosisController::class,'index'])->name('diagnosis.index');
    Route::get('/diagnosis-data',[DiagnosisController::class,'data'])->name('diagnosis.data');
    Route::post('/diagnosis-tambah/{id?}',[DiagnosisController::class,'store'])->name('diagnosis.tambah');
    Route::get('/diagnosis-hapus/{id?}',[DiagnosisController::class,'destroy'])->name('diagnosis.hapus');


    Route::get('/diagnosisgejala',[DiagnosisGejalaController::class,'index'])->name('diagnosisgejala.index');
    Route::get('/datadg',[DiagnosisGejalaController::class,'data'])->name('dg.data');
    Route::post('/getdiagnose',[DiagnosisGejalaController::class,'diagnose'])->name('diagnosisgejala.diagnose');
    Route::post('/saveclient',[DiagnosisGejalaController::class,'client'])->name('save.client');
    // Route::get('/diagnoseresult',[DiagnosisGejalaController::class,''])->name('diagnosisgejala.diagnose');
    
    Route::get('/client',[ClientController::class,'index'])->name('client.index');
});
