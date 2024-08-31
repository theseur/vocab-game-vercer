<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use \Illuminate\Database\QueryException;


class TanarokOldalaPageController extends Controller
{
    public function isAdmin()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('tanarokoldala');
        }

        else
        {
            return redirect('/');
        }
    
       
    }

    public function tanarList()
    {
        if (auth()->user()->hasRole('admin')) {
            $datas = DB::table('users')->get();
        return view("tanarlist", compact("datas"));
        }

        else
        {
            return redirect('/');
        }
    
       
    }

    public function tanarHozzaAdas()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('tanarhozzaadas');
        }

        else
        {
            return redirect('/');
        }
    
       
    }
    
    public function tanarSzerk(Request $request, $tanarid=0) 
    {
        
        
        
        $tanar = DB::table('users')->where('id','=',$tanarid )->first();
        return view('tanarmod', compact("tanar"));
    }

    public function tanarMod(Request $request, $tanarid=0)
    {
       
       
       $pizza = DB::table('users')->where('id','=',$tanarid ) 
        ->update(array
        ('nev'=>$_POST["nev"],'password'=>$_POST["password"],
        'deactivate'=>array_key_exists('deactivate',$_POST)?1:0));
        /*var_dump($_POST);
        echo "<br>";
        var_dump($catprice);*/
        return redirect('targylist')->with('status', 'A tantárgyat módosítottuk.');
        
    }
    
}
