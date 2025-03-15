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
        $feladat =Feladatok::create([
            'userid' => $request->userid,
            
        ]);

        return response()->json();
    }

    public function feladatFeltoltes(Request $request)
    {
        $ropdoli =Ropdolgozat::create([
            'userid' => $request->userid,
            'pontszam'=>$request->pontok
        ]);

        return response()->json();
    }
}
