<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Targytemakor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


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

    public function temakorHozzaAdas()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('temakorhozzaadas');
        }

        else
        {
            return redirect('/');
        }
    
       
    }

    public function indexTemakor()
    {
        if (auth()->user()->hasRole('admin')) 
        {
            $categories = DB::table('targytemakor')->whereNull('szulo')->get();
            return view("temakorhozzaadas", compact("categories"));

        }

        else
        {
            return redirect('/');
        }

    }

    public function temakorStore(Request $request)
    {
        if (auth()->user()->hasRole('admin')) 
        {
            $post = new Targytemakor;
        $post->nev = $request->nev;
        $post->szulo =null;
        
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg|max:2048',
        ]);

        $post->kepnev=null;

        if($request->hasFile('image'))
        {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('img/targytemakor'), $imageName);
            $post->kepnev= $imageName;
        }
        
        try
        {
            $post->save();
            return redirect('temakorhozzaadas')->with('status', 'A tantárgyat hozzáadtuk.');
        }

        catch (Exception $e)
        {
            return view('hibaoldal');
        }
        

        }

        else
        {
            return redirect('/');
        }

        
    }

    public function temakorList()
    {
        if (auth()->user()->hasRole('admin')) {
            $datas = DB::table('targytemakor')->whereNotNull('szulo')->get();
        return view("temakorlist", compact("datas"));
        }

        else
        {
            return redirect('/');
        }
        
    }

    public function temakorSzerk(Request $request, $temakorid=0) 
    {
        
        $files1 = File::files(public_path('img/targytemakor'));
        $categories = DB::table('targytemakor')->whereNull('szulo')->get();
        $temakor = DB::table('targytemakor')->where('id','=',$temakorid )->first();
        return view('temakormod', compact("temakor", "categories", "files1"));
    }

    public function temakorMod(Request $request, $temakorid=0, $tantargyid=0)
    {
        var_dump($_POST);
        
       try
       {
        $pizza = DB::table('targytemakor')->where('id','=',$temakorid ) 
        ->update(array
        ('nev'=>$_POST["nev"],'kepnev'=>$_POST["kepnev"], 
        'deactivate'=>array_key_exists('deactivate',$_POST)?1:0));
        /*var_dump($_POST);
        echo "<br>";
        var_dump($catprice);*/
        return redirect('temakorlist')->with('status', 'A témakört módosítottuk.');
       }

       catch (Exception $e)
       {
           return view('hibaoldal');
       }
       
        
    }
}
