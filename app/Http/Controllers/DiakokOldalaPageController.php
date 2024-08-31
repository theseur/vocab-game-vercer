<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use \Illuminate\Database\QueryException;

class DiakokOldalaPageController extends Controller
{
    public function isAdminDiak()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('diakokoldala');
        }

        else
        {
            return redirect('/');
        }
    
       
    }

    public function indexDiak()
    {
        if (auth()->user()->hasRole('admin')) 
        {
            return view('diakhozzaadas');

        }

        else
        {
            return redirect('/');
        }

    }

    public function diakStore(Request $request)
    {
        if (auth()->user()->hasRole('admin')) 
        {
            $post = new User;
        $post->name = $request->name;
        $post->password = $request->password;
        $post->osztaly=$request->osztaly;
        $post->save();
        return redirect('diakokoldala')->with('status', 'Diák hozzáadása sikerült.');

        }

        else
        {
            return redirect('/');
        }

        
    }

    public function dikakokHozzaAdasCSVbolPage()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('diakokhozzadasacsv');
        }

        else
        {
            return redirect('/');
        }
    }
}
