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
use App\Services\ClassServices;
use App\Models\Ropbeallitas;

class DolgozatSzerkesztesController extends Controller
{

    protected $classService;

    public function __construct(ClassServices $classService)
    {
        $this-> classService = $classService;
    }

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
                ->get(['nev', 'id']);
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
                ->get(['nev', 'id']);

                $datas = DB::table('targytemakor')
                ->where('id', '=', $request->id)
                ->get(['nev', 'id']);
            return view("dolgozattemakoroldal", compact("datas2", "datas"));
        } else {
            return redirect('/');
        }

    }

    public function diakList(Request $request)
    {
        $request->session()->put('temakorid', $request->id);

        return $this->classService->diakList("osztalyListDolgozathoz");

    }

    public function datummeghatarozas(Request $request)
    {
        $post = new Ropbeallitas;
        $post->datum = $request->datum;
        $post->osztaly=$request->osztaly;
        $post->temakorid=$request->session()->get('temakorid');
        $post->tanarid=auth()->id();
        $post->save();

    }



}
