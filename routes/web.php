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
use App\Http\Controllers\DolgozatSzerkesztesController;
use App\Http\Controllers\DolgozatBlade ;
use App\Http\Controllers\RopbeallitasApiController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\KiiratasController;
use App\Http\Controllers\IndexController;

Route::get('/', function () {
    return view('leiras');
});


/*Route::get('/index', function () {
    return view('index');
});

Route::get('/api/index', function () {
    return view('index');
});*/

Route::get('/index', [IndexController::class, 'indexGameStart']);
Route::get('/api/index', [IndexController::class, 'indexGameStart']);


  

Route::get('/szoszedet', [SzoSzedetApiController::class, 'szoSzedetApi']);
Route::get('/api/szoszedet', [SzoSzedetApiController::class, 'szoSzedetApi']);

Route::get('/temakorIndexApi/{tantargyid}', [SzoSzedetApiController::class, 'temakorIndexApi'])->name("temakorIndexApi");
Route::get('/api/temakorIndexApi/{tantargyid}', [SzoSzedetApiController::class, 'temakorIndexApi'])->name("temakorIndexApi");


Route::get('/ropdolgozat/{temakorid}', [SzoSzedetApiController::class, 'szoSzedetDolgozatApi'])->name("ropdolgozat");
Route::get('/api/ropdolgozat/{temakorid}', [SzoSzedetApiController::class, 'szoSzedetDolgozatApi'])->name("ropdolgozat");

Route::get('/ropdolgozatFeltoltes', [RopbeallitasApiController::class, 'ropdolgozatFeltoltes'])->name("ropdolgozatFeltoltes");
Route::get('/api/ropdolgozatFeltoltes', [RopbeallitasApiController::class, 'ropdolgozatFeltoltes'])->name("ropdolgozatFeltoltes");

Route::get('/feladatFeltoltes', [RopbeallitasApiController::class, 'feladatFeltoltes'])->name("feladatFeltoltes");
Route::get('/api/feladatFeltoltes', [RopbeallitasApiController::class, 'feladatFeltoltes'])->name("feladatFeltoltes");


Route::get('/tanarhozzaadas', [TanarhozzadasPageController::class, 'isAdminTanarHozzaAdas'])->name("tanarhozzaadas");
Route::get('/api/tanarhozzaadas', [TanarhozzadasPageController::class, 'isAdminTanarHozzaAdas'])->name("tanarhozzaadasa");

Route::post('/store-form', [TanarokOldalaPageController::class, 'store'])->name("store-form");

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
Route::post('/api/tanarmod/{tanarid}', [TanarokOldalaPageController::class, 'tanarMod'])->name("tanarmod");

Route::get('/tanarszerk/{tanarid}', [TanarokOldalaPageController::class, 'tanarSzerk'])->name("tanarszerk");
Route::get('/api/tanarszerk/{tanarid}', [TanarokOldalaPageController::class, 'tanarSzerk'])->name("tanarszerk");

Route::get('/rolefeltoltes', [TanarokOldalaPageController::class, 'rolefeltoltes'])->name("rolefeltoltes");
Route::get('/api/rolefeltoltes', [TanarokOldalaPageController::class, 'rolefeltoltes'])->name("rolefeltoltes");

Route::post('/rolemod', [TanarokOldalaPageController::class, 'rolestoreform'])->name("rolemod");
Route::post('/api/rolemod/', [TanarokOldalaPageController::class, 'rolestoreform'])->name("rolemod");



Route::get('/diakokoldala', [DiakokOldalaPageController::class, 'isAdminDiak'])->name("diakokoldala");
Route::get('/api/diakokoldala', [DiakokOldalaPageController::class, 'isAdminDiak'])->name("diakokoldala");

Route::get('/indexdiak', [DiakokOldalaPageController::class, 'indexDiak'])->name("indexdiak");
Route::post('/store-formdiak', [DiakokOldalaPageController::class, 'diakStore']);

Route::post('/store-formdiakcsv', [DiakokOldalaPageController::class, 'diakStoreCSV'])->name("formdiakcsv");

Route::get('/diakokhozzadasacsv', [DiakokOldalaPageController::class, 'dikakokHozzaAdasCSVbolPage'])->name("diakokhozzadasacsv");
Route::get('/api/diakokhozzadasacsv', [DiakokOldalaPageController::class, 'dikakokHozzaAdasCSVbolPage'])->name("diakokhozzadasacsvv");

Route::get('/diaklist', [DiakokOldalaPageController::class, 'diakList'])->name("diaklist");
Route::get('/api/diaklist', [DiakokOldalaPageController::class, 'diakList'])->name("diaklist");

Route::post('/diaklistosztalyonkent', [DiakokOldalaPageController::class, 'diakListOsztalyonkent'])->name("diaklistosztalyonkent");
Route::post('/api/diaklistosztalyonkent', [DiakokOldalaPageController::class, 'diakListOsztalyonkent'])->name("diaklistosztalyonkent");

Route::get('/diaktoroltlist', [DiakokOldalaPageController::class, 'diakListtorolt'])->name("diaklisttorolt");
Route::get('/api/diaklisttorolt', [DiakokOldalaPageController::class, 'diakListtorolt'])->name("diaklisttorolt");

Route::post('/diaklistosztalyonkenttorolt', [DiakokOldalaPageController::class, 'diakListOsztalyonkenttorolt'])->name("diaklistosztalyonkenttorolt");
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

Route::get('/isTeacher', [DolgozatSzerkesztesController::class, 'isTeacher'])->name("isTeacher");
Route::get('/api/isTeacher', [DolgozatSzerkesztesController::class, 'isTeacher'])->name("isTeacher");

Route::get('/dolgozattargyak', [DolgozatSzerkesztesController::class, 'tantargyList'])->name("dolgozattargyak");
Route::get('/api/dolgozattargyak', [DolgozatSzerkesztesController::class, 'tantargyList'])->name("dolgozattargyak");

Route::post('/dolgozattemakorok', [DolgozatSzerkesztesController::class, 'temakorList'])->name("dolgozattemakorok");
Route::post('/api/dolgozattemakorok', [DolgozatSzerkesztesController::class, 'temakorList'])->name("dolgozattemakorok");

Route::post('/osztalylist', [DolgozatSzerkesztesController::class, 'diakList'])->name("osztalylist");
Route::post('/api/osztalylist', [DolgozatSzerkesztesController::class, 'diakList'])->name("osztalylist");

Route::post('/datummeghatarozas', [DolgozatSzerkesztesController::class, 'datummeghatarozas'])->name("datummeghatarozas");
Route::post('/api/datummeghatarozas', [DolgozatSzerkesztesController::class, 'datummeghatarozas'])->name("datummeghatarozas");

Route::get('ido', [DolgozatSzerkesztesController::class, 'ido'])->name("ido");
Route::get('/api/ido', [DolgozatSzerkesztesController::class, 'ido'])->name("ido");

Route::get('dolgozatdiak', [DolgozatBlade::class, 'dolgozatdiak'])->name("dolgozatdiak");
Route::get('/api/dolgozatdiak', [DolgozatBlade::class, 'dolgozatdiak'])->name("dolgozatdiak");

Route::get('/isTeacheEredmeny', [KiiratasController::class, 'isTeacher'])->name("isTeacheEredmeny");
Route::get('/api/isTeacheEredmeny', [KiiratasController::class, 'isTeacher'])->name("isTeacheEredmeny");

Route::get('/megIratott', [KiiratasController::class, 'megIratott'])->name("megIratott");
Route::get('/api/megIratott', [KiiratasController::class, 'megIratott'])->name("megIratott");

Route::post('/eredmKezdIdo', [KiiratasController::class, 'eredmKezdIdo'])->name("eredmKezdIdo");
Route::post('/api/eredmKezdIdo', [KiiratasController::class, 'eredmKezdIdo'])->name("eredmKezdIdo");

Route::post('/tanuloNevek', [KiiratasController::class, 'tanuloNevek'])->name("tanuloNevek");
Route::post('/api/tanuloNevek', [KiiratasController::class, 'tanuloNevek'])->name("tanuloNevek");

Route::post('/eredmKiIratas', [KiiratasController::class, 'eredmKiIratas'])->name("eredmKiIratas");
Route::post('/api/eredmKiIratas', [KiiratasController::class, 'eredmKiIratas'])->name("eredmKiIratas");



Route::get('logout', [LogoutController::class, 'logout'])->name("logout");
Route::get('/api/logout', [LogoutController::class, 'logout'])->name("logout");


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
