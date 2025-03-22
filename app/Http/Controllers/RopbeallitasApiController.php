<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Szoszedet;
use App\Models\Targytemakor;
use App\Models\Ropdolgozat;
use App\Models\Feladatok;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Spatie\Permission\Models\Role;
use \Illuminate\Database\QueryException;
use App\Services\ClassServices;
use App\Http\Resources\Ropbeallitas;
use DateTime;

class RopbeallitasApiController extends Controller
{
    public function ropdolgozatFeltoltes(Request $request)
    {
        $feladat =Ropdolgozat::create([
            'userid' => $request->userid,
            'talalat'=>$request->talalat,
            'szoszedetid'=>$request->szoszedetid,
            'kezdesido'=>date('Y-m-d'),
            'ropbeallitasid'=>$request->ropbeallitasid
            
        ]);

        return response()->json($feladat);
    }

    public function feladatFeltoltes(Request $request)
    {
        $ropdoli =Feladatok::create([
            'userid' => $request->userid,
            'pontszam'=>$request->pontszam,
            'ropdolgozatid'=>$request->ropdolgozatid
        ]);

        return response()->json();
    }
}
