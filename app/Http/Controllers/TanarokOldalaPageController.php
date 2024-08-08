<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


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
    
    
}
