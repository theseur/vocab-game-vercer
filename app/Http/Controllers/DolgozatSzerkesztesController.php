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

      public function temakorList(Request $request)
    {
        if (auth()->user()->hasRole('teacher')) {

            $datas2 = DB::table('targytemakor')
                ->where('szulo', '=', $request->id)
                ->get(['nev']);

                $datas = DB::table('targytemakor')
                ->where('id', '=', $request->id)
                ->get(['nev']);
            return view("dolgozattemakoroldal", compact("datas2", "datas"));
        } else {
            return redirect('/');
        }

    }

    public function diakList()
    {
        if (auth()->user()->hasRole('teache')) {

            $datas2 = DB::table('users')->distinct()
                ->where('osztaly', '!=', '')
                ->where('osztaly', 'not like', 'teacher')
                ->where('deactivate', '=', '0')
                ->get(['osztaly']);
            return view("diaklist", compact("datas2"));
        } else {
            return redirect('/');
        }

    }



}
