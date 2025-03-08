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

class RopbeallitasController extends Controller
{
    public function eredmenyFeltoltes(Request $request)
    {

    }
}
