<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SzoSzedetApiController;
use App\Http\Controllers\TanarokOldalaPageController;
use App\Http\Controllers\DiakokOldalaPageController;
use App\Http\Controllers\TanarhozzadasPageController;
use App\Http\Controllers\PostController;

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


Route::post('store-form', [PostController::class, 'store']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
