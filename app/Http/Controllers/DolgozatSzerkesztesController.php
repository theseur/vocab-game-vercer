<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use \Illuminate\Database\QueryException;
use App\Models\Targytemakor;

class DolgozatSzerkesztesController extends Controller
{
    public function isTeacher()
    {
        if (auth()->user()->hasRole('teacher')) {
            return view('dolgozatoldal')->with('status', '');
        } else {
            return redirect('/');
        }

    }

    public function tantargyList()
    {
        if (auth()->user()->hasRole('teacher')) {

            $datas2 = DB::table('targytemakor')->distinct()
                ->whereNull('szulo')
                ->where('deactivate', '=', '0')
                ->get(['nev']);
            return view("dolgozatoldal", compact("datas2"));
        } else {
            return redirect('/');
        }

    }


}
