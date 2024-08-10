<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SzoSzedetApiController;
use App\Http\Controllers\TanarokOldalaPageController;
use App\Http\Controllers\DiakokOldalaPageController;
use App\Http\Controllers\TanarhozzadasPageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TargyController;
use App\Http\Controllers\TemakorController;

Route::get('/', function () {
    return view('leiras');
});


Route::get('/index', function () {
    return view('index');
});
Route::get('/api/index', function () {
    return view('index');
});

Route::get('/szoszedet', [SzoSzedetApiController::class, 'szoSzedetApi']);
Route::get('/api/szoszedet', [SzoSzedetApiController::class, 'szoSzedetApi']);

Route::get('/tanarokoldala', [TanarokOldalaPageController::class, 'isAdmin'])->name("tanarokoldala");
Route::get('/api/tanarokoldala', [TanarokOldalaPageController::class, 'isAdmin'])->name("tanarokoldala");

Route::get('/diakokoldala', [DiakokOldalaPageController::class, 'isAdminDiak'])->name("diakokoldala");
Route::get('/api/diakokoldala', [DiakokOldalaPageController::class, 'isAdminDiak'])->name("diakokoldala");

Route::get('/tanarhozzaadas', [TanarhozzadasPageController::class, 'isAdminTanarHozzaAdas'])->name("tanarhozzaadas");
Route::get('/api/tanarhozzaadas', [TanarhozzadasPageController::class, 'isAdminTanarHozzaAdas'])->name("tanarhozzaadasa");


Route::post('/store-form', [PostController::class, 'store']);

Route::get('/indexTargy', [TargyController::class, 'indexTargy'])->name("indexTargy");
Route::post('/store-formtargy', [TargyController::class, 'targyStore']);

Route::get('/tantargyoldal', [TargyController::class, 'isAdminTantargy'])->name("tantargyoldal");
Route::get('/api/tantargyoldal', [TargyController::class, 'isAdminTantargy'])->name("tantargyoldal");



Route::get('/targylist', [TargyController::class, 'targyList'])->name("targylist");
Route::get('/api/targylist', [TargyController::class, 'targyList'])->name("targylist");

Route::get('/tantargyszerk/{tantargyid}', [TargyController::class, 'tanTargySzerk'])->name("tantargyszerk");
Route::get('/api/tantargyszerk/{tantargyid}', [TargyController::class, 'tanTargySzerk'])->name("tantargyszerk");


Route::post('/tantargymod/{tantargyid}', [TargyController::class, 'tanTargyMod'])->name("tantargymod");
Route::post('/api/tantargymod/{tantargyid}', [TargyController::class, 'tanTargyMod'])->name("tantargymod");


Route::get('/temakoroldal', [TemakorController::class, 'isAdminTemakor'])->name("temakoroldal");
Route::get('/api/temakoroldal', [TemakorController::class, 'isAdminTemakor'])->name("temakoroldal");



Route::get('/tanarlist', [TanarokOldalaPageController::class, 'tanarList'])->name("tanarlist");
Route::get('/api/tanarlist', [TanarokOldalaPageController::class, 'tanarList'])->name("tanarlist");

Route::get('/tantargyhozzaadas', [TanarokOldalaPageController::class, 'tantargyHozzaAdas'])->name("tantargyhozzaadas");
Route::get('/api/tantargyhozzaadas', [TanarokOldalaPageController::class, 'tantargyHozzaAdas'])->name("tantargyhozzaadas");


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
