<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Szoszedet;

class SzoSzedetController extends Controller
{
    public function show(): View
    {   
        var_dump(Szoszedet::all());
        return view('welcome');
    }
}
