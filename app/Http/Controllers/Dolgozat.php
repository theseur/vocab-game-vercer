<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Szoszedet;
use App\Models\Targytemakor;
use App\Models\Ropdolgozat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Spatie\Permission\Models\Role;
use \Illuminate\Database\QueryException;
use App\Services\ClassServices;
use App\Http\Resources\Ropbeallitas;
use DateTime;

class Dolgozat extends Controller
{
    public function vanEDolgozat(Request $request)
    {
        $osztaly=$request->osztaly;
        $my_date_time = date("Y-m-d H:i:s", strtotime("+1 hours"));
        $date= date("Y-m-d H:i:s");
        $datas = DB::table('ropbeallitas')
        ->where('datum', '>=',  $date)
        ->where('datum', '<',  $my_date_time)
        ->where('osztaly', 'like',  $osztaly )
        ->get();

        if($datas->count()>0)
        {
            return Ropbeallitas::collection($datas) ;
        }
        else
        {
            return response()->json([
                'message' => 'Ma nincs dolgozat!'
               
            ],404);
        }

    }


}
