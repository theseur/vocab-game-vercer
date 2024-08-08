<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TanarhozzadasPageController extends Controller
{
    public function isAdminTanarHozzaAdas()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('tanarhozzaadas');
        }

        else
        {
            return redirect('/');
        }
    
       
    }
}
