<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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
}
