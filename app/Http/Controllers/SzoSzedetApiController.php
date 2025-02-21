<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Szoszedet;
use App\Http\Resources\Ropbeallitas;
use Illuminate\Support\Facades\DB;

class SzoSzedetApiController extends Controller
{
    public function szoSzedetApi()
    {

        $otszo=Szoszedet::inRandomOrder()->limit(5)->get();
        return response()->json($otszo);
    }
    
    public function szoSzedetDolgozatApi($temakorid = 0)
    {

        $otszo=DB::table('szoszedet')->where('temakorid', '=', $temakorid)->first()
        ->inRandomOrder()->limit(5)->get();
        return response()->json($otszo);
    }
}
