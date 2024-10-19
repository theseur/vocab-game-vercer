<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Targytemakor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use \Illuminate\Database\QueryException;

class TargyController extends Controller
{

    public function isAdminTantargy()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('tantargyoldal')->with('status', '');
        } else {
            return redirect('/');
        }

    }

    public function indexTargy()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('tantargyhozzaadas');

        } else {
            return redirect('/');
        }

    }

    public function targyStore(Request $request)
    {
        if (auth()->user()->hasRole('admin')) {
            $post = new Targytemakor;
            $post->nev = $request->nev;
            $post->szulo = null;

            $request->validate([
                'image' => 'image|mimes:jpeg,jpg|max:2048',
            ]);

            $post->kepnev = null;

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('img/targytemakor'), $imageName);
                $post->kepnev = $imageName;
            }

            try
            {
                $post->save();
                return view('tantargyhozzaadas')->with('status', 'A tantárgyat hozzáadtuk.');
            } catch (QueryException $e) {
                return view('hibaoldal');
            }

        } else {
            return redirect('/');
        }

    }

    public function targyList()
    {
        if (auth()->user()->hasRole('admin')) {
            $datas = DB::table('targytemakor')->whereNull('szulo')->get();

            return view("targylist", compact("datas"));
        } else {
            return redirect('/');
        }

    }

    public function tanTargySzerk(Request $request, $tantargyid = 0)
    {

        $files1 = File::files(public_path('img/targytemakor'));

        $tantargy = DB::table('targytemakor')->where('id', '=', $tantargyid)->first();
        return view('tantargymod', compact("tantargy", "files1"));
    }

    public function tanTargyMod(Request $request, $tantargyid = 0)
    {

        try
        {
            $pizza = DB::table('targytemakor')->where('id', '=', $tantargyid)
                ->update(array
                    ('nev' => $_POST["nev"], 'kepnev' => $_POST["kepnev"],
                        'deactivate' => array_key_exists('deactivate', $_POST) ? 1 : 0));
            /*var_dump($_POST);
            echo "<br>";
            var_dump($catprice);*/
            $status="Módosítottuk.";
            $datas = DB::table('targytemakor')->whereNull('szulo')->get();
            return view('targylist', compact("status", "datas"));
        } catch (QueryException $e) {
            return view('hibaoldal');
        }

    }
}
