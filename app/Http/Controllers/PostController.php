<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PostController extends Controller
{

    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('tanarhozzaadas');

        } else {
            return redirect('/');
        }

    }

    public function store(Request $request)
    {
        if (auth()->user()->hasRole('admin')) {
            $post = new User;
            $post->name = $request->name;
            $post->password = $request->password;
            $post->osztaly = "teacher";
            $post->save();
            return redirect('tanarokoldala')->with('status', 'Tanár hozzáadása sikerült.');

        } else {
            return redirect('/');
        }

    }
}
