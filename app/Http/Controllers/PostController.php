<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class PostController extends Controller
{
    
        
            public function index()
            {
                if (auth()->user()->hasRole('admin')) 
                {
                    return view('tanarhozzaadas');

                }

                else
                {
                    return redirect('/');
                }

            }


          
            public function store(Request $request)
            {
                if (auth()->user()->hasRole('admin')) 
                {
                    $post = new User;
                $post->name = $request->name;
                $post->password = $request->password;
                $post->osztaly="teacher";
                $post->save();
                return redirect('tanarokoldala')->with('status', 'Blog Post Form Data Has Been inserted');

                }

                else
                {
                    return redirect('/');
                }

                
            }
}

      
    
       
    

