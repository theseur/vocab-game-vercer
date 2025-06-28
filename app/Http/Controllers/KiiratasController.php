<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use \Illuminate\Database\QueryException;
use App\Models\Targytemakor;
use App\Services\ClassServices;
use App\Models\Ropbeallitas;
use Carbon\Carbon;
use DateTime;
use Response;

class KiiratasController extends Controller
{
       public function isTeacher()
    {
      
        if (auth()->user()->hasRole('teacher')) {
            return view('eredmenyoldal')->with('status', '');
        } else {
            return redirect('/');
        }

    }

    public function megIratott()
    {
         if (auth()->user()->hasRole('teacher')) {
         $user = auth()->user()->id;
         $results = DB::table('feladatok')
            ->distinct()
            ->join('ropdolgozat', 'feladatok.ropdolgozatid', '=', 'ropdolgozat.ropbeallitasid')
            ->join('ropbeallitas', 'ropdolgozat.ropbeallitasid', '=', 'ropbeallitas.id')
            ->join('users', 'feladatok.userid', '=', 'users.id')
            ->select(
                'users.osztaly',                
            )
            ->where('ropbeallitas.tanarid', '=', $user)
            ->orderBy('users.osztaly', 'asc')
            ->get();

              return view("eredmenyosztaly", compact("results"));
        } else {
            return redirect('/');
        }
    }

    public function eredmKezdIdo(Request $request)
    {
        $results = DB::table('ropbeallitas')
        ->distinct()
        ->join('ropdolgozat', 'ropbeallitas.id' ,'=' ,'ropdolgozat.ropbeallitasid')
        ->select(
                'ropbeallitas.datum', 'ropbeallitas.osztaly'               
            )
        ->where('ropbeallitas.osztaly', 'like', '%'.$request->osztaly.'%')
         ->orderBy('ropbeallitas.datum', 'asc')
            ->get();

                 return view("eredmenydatum", compact("results"));
    } 
    
    public function tanuloNevek(Request $request)
    {
         $results = DB::table('feladatok')
            ->join('ropdolgozat', 'feladatok.ropdolgozatid', '=', 'ropdolgozat.id')
            ->join('ropbeallitas', 'ropdolgozat.ropbeallitasid', '=', 'ropbeallitas.id')
            ->join('users', 'feladatok.userid', '=', 'users.id')
             ->select(
                'users.name', 'feladatok.pontszam','ropbeallitas.osztaly',   'ropbeallitas.datum'          
            )
              ->where('ropbeallitas.osztaly', 'like', '%'.$request->osztaly.'%')
                ->where('ropbeallitas.datum', '=', $request->datum)
            ->get();
            
            return view("eredmenypontok", compact("results"));


    }

    public function eredmKiIratas(Request $request)
    {
        $results = DB::table('feladatok')
            ->join('ropdolgozat', 'feladatok.ropdolgozatid', '=', 'ropdolgozat.id')
            ->join('ropbeallitas', 'ropdolgozat.ropbeallitasid', '=', 'ropbeallitas.id')
            ->join('users', 'feladatok.userid', '=', 'users.id')
             ->select(
                'users.name', 'feladatok.pontszam'               
            )
              ->where('ropbeallitas.osztaly', 'like', '%'.$request->osztaly.'%')
                ->where('ropbeallitas.datum', '=', $request->datum)
            ->get();
                //dd($request);
            if($request->filetype=="csv")
            {
                
            $csvFileName = 'user.csv';
                $csvFile = fopen($csvFileName, 'w');
                $headers = array_keys((array)  $results[0]); // Get the column headers from the first row
                fputcsv($csvFile, $headers,';');

                foreach ($results as $row) {
                    fputcsv($csvFile, (array) $row,';');
                }

                fclose($csvFile);

                // Download the CSV file
                return Response::download(public_path($csvFileName))->deleteFileAfterSend(true);
            }
            else{
                $fileName = 'Eredmeny.txt';
                $txtFile = fopen($fileName, 'w');
                //$headers = array_keys((array)  $results[0]); // Get the column headers from the first row
                //fputs($txtFile, $headers,';');

                foreach ($results as $row) {
                    fputs($txtFile,  $row->name.';'.$row->pontszam.'\n');
                }

                fclose($txtFile);

                return Response::download(public_path($fileName))->deleteFileAfterSend(true);

            }


    }

}
