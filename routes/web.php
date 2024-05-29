<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SzoSzedetController;
use App\Http\Controllers\SzoSzedetApiController;

Route::get('/', function () {
    return view('index');
});

Route::get('/szoszedet'  , [SzoSzedetController::class,  'show']);
Route::get('/api/szoszedet'  , [SzoSzedetApiController::class,  'szoSzedetApi']);


