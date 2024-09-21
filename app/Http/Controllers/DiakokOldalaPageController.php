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

class DiakokOldalaPageController extends Controller
{
    public function isAdminDiak()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('diakokoldala')->with('status', '');
        } else {
            return redirect('/');
        }

    }

    public function indexDiak()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('diakhozzaadas');

        } else {
            return redirect('/');
        }

    }

    public function diakStore(Request $request)
    {
        if (auth()->user()->hasRole('admin')) {

            if ($this->Osztalyvizsgalat($request->osztaly) === true) {
                $post = new User;
                $post->name = $request->name;
                $post->password = $request->password;
                $post->osztaly = $request->osztaly;
                $post->save();
                return view('diakokoldala')->with('status', 'Diák hozzáadása sikerült.');

            } else {

                return view('diakokoldala')->with('status', $this->Osztalyvizsgalat($request->osztaly));

            }
        } else {
            return redirect('/');
        }

    }

    public function dikakokHozzaAdasCSVbolPage()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('diakokhozzadasacsv');
        } else {
            return redirect('/');
        }
    }

    public function diakStoreCSV(Request $request)
    {
        if (auth()->user()->hasRole('admin')) {
            if ($this->Osztalyvizsgalat($request->osztaly) === true) {

                $request->validate([
                    'myfile' => 'required|mimes:csv,txt',
                ]);

                if ($request->hasFile('myfile')) {
                    $imageName = time() . '.' . $request->myfile->extension();
                    $request->myfile->move(public_path('csv'), $imageName);

                }

                $myFile = fopen(public_path('csv') . '/' . $imageName, "r") or die("Unable to open file!");
                $szoszedet = [];
                $vanehiba = false;
                while (!feof($myFile)) {

                    $megvane = utf8_encode(fgets($myFile));
                    if (strlen($megvane) > 0) {
                        $elso = explode(";", $megvane);
                        if (count($elso) > 2) {
                            $datas = "Nem jó az oszlopok száma!";
                            $vanehiba = true;
                            break;

                        }
                        if (strlen($elso[0]) == 0) {
                            $datas = "Van egy üres rublika az első oszlopban!";
                            $vanehiba = true;
                            break;
                        }
                        if (strlen($elso[1]) < 3) {
                            $datas = "Van egy üres rublika a második oszlopban!";
                            $vanehiba = true;
                            break;
                        }
                        array_push($szoszedet, $elso);

                        // echo var_dump($szoszedet[0][1])  . "<br>";

                    }

                }

                fclose($myFile);

                if ($vanehiba == false) {
                    //echo 'benn';

                    $vanehiba2 = false;
                    $hanydikSorbanHiba = 0;
                    foreach ($szoszedet as $egy) {
                        $jelszo = trim($egy[1]);
                        $hanydikSorbanHiba++;
                        $post = new User;
                        $post->name = $egy[0];
                        $post->password = $jelszo;
                        $post->osztaly = $request->osztaly;
                        try
                        {
                            $post->save();
                        } catch (QueryException $e) {
                            $datas = "A " . $hanydikSorbanHiba . " van a hiba";
                            return view('hibaoldal', compact("datas"));
                        }

                    }

                }
            } else {

                return view('diakokoldala')->with('status', $this->Osztalyvizsgalat($request->osztaly));

            }
        } else {
            return redirect('/');
        }
    }

    public function diakList()
    {
        if (auth()->user()->hasRole('admin')) {

            $datas2 = DB::table('users')->distinct()
                ->where('osztaly', '!=', '')
                ->where('osztaly', 'not like', 'teacher')
                ->get(['osztaly']);
            return view("diaklist", compact("datas2"));
        } else {
            return redirect('/');
        }

    }

    public function diakListOsztalyonkent(Request $request)
    {
        if (auth()->user()->hasRole('admin')) {
            $osztaly = $request->osztaly;
            $datas = DB::table('users')->where('osztaly', 'like', $osztaly)->get();
            // ->whereNotNull('osztaly')->get();

            return view("diaklistosztalyonkent", compact("datas"));
        } else {
            return redirect('/');
        }

    }

    public function diakSzerk(Request $request, $diakid = 0)
    {

        $diak = DB::table('users')->where('id', '=', $diakid)->first();
        return view('diakmod', compact("diak"));
    }

    public function diakMod(Request $request, $diakid = 0)
    {
        if ($this->Osztalyvizsgalat($request->osztaly) === true) {
            $pizza = DB::table('users')->where('id', '=', $diakid)
                ->update(array
                    ('name' => $_POST["name"], 'password' => Hash::make($request->password),
                        'deactivate' => property_exists($request, 'deactivate') ? 1 : 0));
            /*var_dump($_POST);
            echo "<br>";
            var_dump($catprice);*/
            return view('diakokoldala')->with('status', ' Módosítottuk.');
        } else {

            return view('diakokoldala')->with('status', $this->Osztalyvizsgalat($request->osztaly));

        }

    }

    public function Osztalyvizsgalat($osztaly)
    {
        if (!is_numeric(substr($osztaly, 0, 1))) {
            $hibauzenet = "Nem számmal kezdődik az osztály!";
            return $hibauzenet;
        }

        if (substr($osztaly, 1, 1) != ".") {
            $hibauzenet = "Túl nagy az osztály száma!";

            return $hibauzenet;
        }
        if (1 > intval(substr($osztaly, 0, 1)) || intval(substr($osztaly, 0, 1)) > 8) {
            $hibauzenet = "Az osztály száma nagyobb mint nyolc vagy kisebb mint egy";

            return $hibauzenet;

        }

        return true;

    }
}
