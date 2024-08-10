<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;


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

    public function tantargyHozzaAdas()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('tantargyhozzaadas');
        }

        else
        {
            return redirect('/');
        }
    
       
    }
    
    
}
