<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Szoszedet;

class SzoSzedetApiController extends Controller
{
    public function szoSzedetApi()
    {

        $otszo=Szoszedet::inRandomOrder()->limit(5)->get();
        return response()->json($otszo);
    }
    
}
