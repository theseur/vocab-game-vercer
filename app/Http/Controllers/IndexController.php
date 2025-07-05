<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Szoszedet;
use App\Models\Targytemakor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Spatie\Permission\Models\Role;
use \Illuminate\Database\QueryException;
use App\Services\ClassServices;


class IndexController extends Controller
{
    public function indexGameStart()
    {
         $datas = DB::table('targytemakor')->whereNull('szulo')->get();
        return view('index',compact("datas"));
    }

 
}
