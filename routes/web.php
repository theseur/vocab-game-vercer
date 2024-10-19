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

Route::get('/indextemakor', [TemakorController::class, 'indexTemakor'])->name("indextemakor");
Route::post('/store-formtemakor', [TemakorController::class, 'temakorStore']);

Route::get('/temakorlist', [TemakorController::class, 'temakorList'])->name("temakorlist");
Route::get('/api/temakorlist', [TemakorController::class, 'temakorList'])->name("temakorlist");

Route::get('/temakorszerk/{temakorid}', [TemakorController::class, 'temakorSzerk'])->name("temakorszerk");
Route::get('/api/temakorszerk/{temakorid}', [TemakorController::class, 'temakorSzerk'])->name("temakorszerk");

Route::post('/temakormod/{temakorid}', [TemakorController::class, 'temakorMod'])->name("temakormod");
Route::post('/api/temakormod/{temakorid}', [TemakorControllerr::class, 'temakorMod'])->name("temakormod");

Route::get('/temakorhozzaadas', [TemakorController::class, 'temakorHozzaAdas'])->name("temakorhozzaadas");
Route::get('/api/temakorhozzaadas', [TemakorController::class, 'temakorHozzaAdas'])->name("temakorhozzaadas");

Route::get('/tantargyhozzaadas', [TanarokOldalaPageController::class, 'tantargyHozzaAdas'])->name("tantargyhozzaadas");
Route::get('/api/tantargyhozzaadas', [TanarokOldalaPageController::class, 'tantargyHozzaAdas'])->name("tantargyhozzaadas");

Route::get('/tanarlist', [TanarokOldalaPageController::class, 'tanarList'])->name("tanarlist");
Route::get('/api/tanarlist', [TanarokOldalaPageController::class, 'tanarList'])->name("tanarlist");

Route::get('/tanarokoldala', [TanarokOldalaPageController::class, 'isAdmin'])->name("tanarokoldala");
Route::get('/api/tanarokoldala', [TanarokOldalaPageController::class, 'isAdmin'])->name("tanarokoldala");

Route::get('/tanarhozzaadas', [TanarhozzadasPageController::class, 'isAdminTanarHozzaAdas'])->name("tanarhozzaadas");
Route::get('/api/tanarhozzaadas', [TanarhozzadasPageController::class, 'isAdminTanarHozzaAdas'])->name("tanarhozzaadasa");

Route::get('/tanarszerk/{tanarid}', [TanarokOldalaPageController::class, 'tanarSzerk'])->name("tanarszerk");
Route::get('/api/tanarszerk/{tanarid}', [TanarokOldalaPageController::class, 'tanarSzerk'])->name("tanarszerk");


Route::post('/tanarmod/{tanarid}', [TanarokOldalaPageController::class, 'tanarMod'])->name("tanarmod");
Route::post('/api/tanarmod/{tanaridd}', [TanarokOldalaPageController::class, 'tanarMod'])->name("tanarmod");

Route::get('/tanarszerk/{tanarid}', [TanarokOldalaPageController::class, 'tanarSzerk'])->name("tanarszerk");
Route::get('/api/tanarszerk/{tanarid}', [TanarokOldalaPageController::class, 'tanarSzerk'])->name("tanarszerk");



Route::get('/diakokoldala', [DiakokOldalaPageController::class, 'isAdminDiak'])->name("diakokoldala");
Route::get('/api/diakokoldala', [DiakokOldalaPageController::class, 'isAdminDiak'])->name("diakokoldala");

Route::get('/indexdiak', [DiakokOldalaPageController::class, 'indexDiak'])->name("indexdiak");
Route::post('/store-formdiak', [DiakokOldalaPageController::class, 'diakStore']);

Route::post('/store-formdiakcsv', [DiakokOldalaPageController::class, 'diakStoreCSV']);

Route::get('/diakokhozzadasacsv', [DiakokOldalaPageController::class, 'dikakokHozzaAdasCSVbolPage'])->name("diakokhozzadasacsv");
Route::get('/api/diakokhozzadasacsv', [DiakokOldalaPageController::class, 'dikakokHozzaAdasCSVbolPage'])->name("diakokhozzadasacsvv");

Route::get('/diaklist', [DiakokOldalaPageController::class, 'diakList'])->name("diaklist");
Route::get('/api/diaklist', [DiakokOldalaPageController::class, 'diakList'])->name("diaklist");

Route::post('/diaklistosztalyonkent', [DiakokOldalaPageController::class, 'diakListOsztalyonkent'])->name("diaklistosztalyonkent");
Route::post('/api/diaklistosztalyonkent', [DiakokOldalaPageController::class, 'diakListOsztalyonkent'])->name("diaklistosztalyonkent");

Route::get('/diaklisttorolt', [DiakokOldalaPageController::class, 'diakListtorolt'])->name("diaklisttorolt");
Route::get('/api/diaklisttorolt', [DiakokOldalaPageController::class, 'diakListtorolt'])->name("diaklisttorolt");

Route::post('/diaklistosztalyonkenttorolt', [DiakokOldalaPageController::class, 'diakListOsztalyonkenttorolt'])->name("diaklistosztalyonkent");
Route::post('/api/diaklistosztalyonkenttorolt', [DiakokOldalaPageController::class, 'diakListOsztalyonkenttorolt'])->name("diaklistosztalyonkenttorolt");


Route::post('/diakmod/{diakid}', [DiakokOldalaPageController::class, 'diakMod'])->name("diakmod");
Route::post('/api/diakmod/{diakid}', [DiakokOldalaPageController::class, 'diakMod'])->name("diakmod");

Route::get('/diakszerk/{diakid}', [DiakokOldalaPageController::class, 'diakSzerk'])->name("diakszerk");
Route::get('/api/diakszerk/{diakd}', [DiakokOldalaPageController::class, 'diakSzerk'])->name("diakszerk");

Route::get('/nyolcadikosoktorlese', [DiakokOldalaPageController::class, 'nyolcadikosokTorlese'])->name("nyolcadikosoktorlese");
Route::get('/api/nyolcadikosoktorlese', [DiakokOldalaPageController::class, 'nyolcadikosokTorlese'])->name("nyolcadikosoktorlese");

Route::get('/osztalyokeloreleptetese', [DiakokOldalaPageController::class, 'osztalyokEloreLeptetese'])->name("osztalyokeloreleptetese");
Route::get('/api/osztalyokeloreleptetese', [DiakokOldalaPageController::class, 'osztalyokEloreLeptetese'])->name("osztalyokeloreleptetese");


Route::get('/torles', [DiakokOldalaPageController::class, 'torles'])->name("torles");
Route::get('/api/torles', [DiakokOldalaPageController::class, 'torles'])->name("torles");


Route::get('/leptetes', [DiakokOldalaPageController::class, 'osztalyokEloreLeptetese'])->name("leptetes");
Route::get('/api/leptetes', [DiakokOldalaPageController::class, 'osztalyokEloreLeptetese'])->name("leptetes");

Route::get('/leptetes2', [DiakokOldalaPageController::class, 'leptetes'])->name("leptetes2");
Route::get('/api/leptetes2', [DiakokOldalaPageController::class, 'leptetes'])->name("leptetes2");


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
