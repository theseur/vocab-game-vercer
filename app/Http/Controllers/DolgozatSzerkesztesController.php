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
use Carbon\Carbon;
use DateTime;

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

    public function tantargyList($status="")
    {
        $user = auth()->user()->id;
       // var_dump($user);
        //dd($user);
        //exit;
        if (auth()->user()->hasRole('teacher')) {

            $datas2 = DB::table('targytemakor')->distinct()
                ->whereNull('szulo')
                ->where('deactivate', '=', '0')
                ->get(['nev', 'id']);
            return view("dolgozatoldal", compact("datas2","user","status"));
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
        $ropdoliidopont=str_replace('T',' ',$request->datum);
            $ropdoliidopont.=':00';
            $date = DateTime::createFromFormat('Y-m-d H:i:s', $ropdoliidopont);
        $date1=DateTime::createFromFormat('Y-m-d H:i:s', $ropdoliidopont);
        $date1= date_modify($date1, "+1 hour");
        $post->datum = $ropdoliidopont;
        $post->osztaly=$request->osztaly;
        $post->temakorid=$request->session()->get('temakorid');
        $post->tanarid=auth()->user()->id;
        $datas = DB::table('ropbeallitas')
        ->where('datum', '>=',  $date)
        ->where('datum', '<',  $date1)
        ->get(['datum', 'osztaly']);

       
        if($datas->count()==0)
            {
            try
            {
                $post->save();

            }
            catch(Throwable $e)
            {
                $datas='Ennek az osztálynak van már ebben az időpontban röpdlgozata!';
                return view('hibaoldal', compact("datas"));
            }
            }
            else
            {
                $datas='Ennek az osztálynak van már ebben az időpontban röpdlgozata!';
                return view('hibaoldal', compact("datas"));
            }


        


        $datas3 = DB::table('targytemakor')
        ->where('id', '=',   $post->temakorid)
        ->get(['nev' ]);
        $uzenet="A dolgozatot sikeresen rögzítettük! ".$post->datum ." ".$post->osztaly." ".$datas3[0]->nev;

        return $this->tantargyList($uzenet);

    }

    public function  ido()
    {
        $current = Carbon::now();
        $current=$current->format('Y-m-d H:i:s');
        $currentTime = Carbon::now()->toTimeString();
        $now = Carbon::now()->toDateString() .' '.  substr($currentTime, 0, strrpos( $currentTime, ':') ) ;
        $dateTimeNew = Carbon::now()->addHour();
        $dateTimeNew=$dateTimeNew->format('Y-m-d H:i:s');
        $dateTimeNewToString = Carbon::now()->addHour()->toTimeString();
        $szavak=array(
            "jelengi idő", 
        $current, 
        "Az idő stringgé alakítva",
        $currentTime,
        "óra és perc",
        $now,
        "jelengi idő +1óra",
        $dateTimeNew,
        "jelengi idő +1óra stringgé alakítva",
        $dateTimeNewToString

        
    );
    $datas2 = DB::table('ropbeallitas')
    ->where('datum', '>=',  $current)
    
    ->get(['datum', 'osztaly']);

    $datas = DB::table('ropbeallitas')
    ->where('datum', '>=',  $current)
    ->where('datum', '<',  $dateTimeNew)
    ->get(['datum', 'osztaly']);
        
    return view("idooldal")
    ->with('szavak', $szavak)
    ->with(compact("datas2"))
    ;

       // return view("idooldal", compact("current", "currentTime", "now", "dateTimeNew", "dateTimeNewToString" ));

    }



}
