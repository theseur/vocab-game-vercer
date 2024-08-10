<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Targytemakor;
use Illuminate\Support\Facades\DB;


class TemakorController extends Controller
{
    public function isAdminTemakor()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('temakoroldal');
        }

        else
        {
            return redirect('/');
        }
    
       
    }
}
