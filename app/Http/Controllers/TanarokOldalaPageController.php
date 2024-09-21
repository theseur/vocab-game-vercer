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

        $pizza = DB::table('users')->where('id', '=', $tanarid)
            ->update(array
                ('name' => $_POST["name"], 'password' => Hash::make($request->password),
                    'deactivate' => property_exists($request, 'deactivate') ? 1 : 0));
        /*var_dump($_POST);
        echo "<br>";
        var_dump($catprice);*/
        return view('tanarlist')->with('status', ' Módosítottuk.');

    }

}
