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

class TanarokOldalaPageController extends Controller
{
    public function isAdmin()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('tanarokoldala')->with('status', '');
        } else {
            return redirect('/');
        }

    }

    public function tanarList()
    {
        if (auth()->user()->hasRole('admin')) {
            $datas = DB::table('users')->where('osztaly', 'like', 'teacher')->get();
            return view("tanarlist", compact("datas"));
        } else {
            return redirect('/');
        }

    }

    public function tanarHozzaAdas()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('tanarhozzaadas');
        } else {
            return redirect('/');
        }

    }

    public function tanarSzerk(Request $request, $tanarid = 0)
    {

        $tanar = DB::table('users')->where('id', '=', $tanarid)->first();
        return view('tanarmod', compact("tanar"));
    }

    public function tanarMod(Request $request, $tanarid = 0)
    {
        try{
            DB::table('users')->where('id', '=', $tanarid)
            ->update(array
                ('name' => $request->name, 
                'email'=> $request->email,
                'password' => Hash::make($request->password),
                    'deactivate' => isset($request->deactivate) ? 1 : 0));
        /*var_dump($_POST);
        echo "<br>";
        var_dump($catprice);*/
        $datas = DB::table('users')->where('osztaly', 'like', 'teacher')->get();
        $status="Módosítottuk.";
        return view('tanarlist', compact("status", "datas"));

        }
        catch (QueryException $e) {
            $datas = "Van ilyen felhasználónév és email páros az adatbázisban.";
            return view('hibaoldal', compact("datas"));
        }

        

    }

    public function store(Request $request)
    {

        try
        {
            if (auth()->user()->hasRole('admin')) {
                $post = new User;
                $post->name = $request->name;
                $post->email = $request->email;
                $post->password = $request->password;
                $post->osztaly = "teacher";
                $post->save();
                return redirect('tanarokoldala')->with('status', 'Tanár hozzáadása sikerült.');
    
            } else {
                return redirect('/');
            }
        }

        catch (QueryException $e) {
            $datas = "Van ilyen felhasználónév és jeszó páros az adatbázisban.";
            return view('hibaoldal', compact("datas"));
        }
        

    }

}
