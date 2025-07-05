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

        $otszo=DB::table('szoszedet')->where('temakorid', '=', $temakorid)
        ->inRandomOrder()->limit(5)->get();
        return response()->json($otszo);
    }

    public function temakorIndexApi($tantargyid = 0)
    {
         $resultsTemakor =DB::table('targytemakor')
         ->where('szulo', '=', $tantargyid)
          ->orderBy('id', 'asc')
        ->get();
        return response()->json( $resultsTemakor);

    }
    
}
