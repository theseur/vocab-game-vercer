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
use Spatie\Permission\Models\Role;
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

            try {
                if ($this->Osztalyvizsgalat($request->osztaly) === true) {
                    $post = new User;
                    $post->name = $request->name;
                    $post->email = $request->email;
                    $post->password = $request->password;
                    $post->osztaly = $request->osztaly;
                    $post->save();
                    $role = Role::findByName('user');
                    $post->assignRole($role);
                    return view('diakokoldala')->with('status', 'Diák hozzáadása sikerült.');

                } else {

                    return view('diakokoldala')->with('status', $this->Osztalyvizsgalat($request->osztaly));

                }

            } catch (QueryException $e) {
                $datas = "A " . $hanydikSorbanHiba . " van a hiba";
                return view('hibaoldal', compact("datas"));
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
                        if (count($elso) > 4) {
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
                        if (strlen($elso[2]) == 0) {
                            $datas = "Van egy üres rublika a harmadik oszlopban!";
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
                        $post->email = $egy[2];
                        $post->osztaly = $request->osztaly;
                        try
                        {
                            $post->save();
                            $role = Role::findByName('user');
                            $post->assignRole($role);

                        } catch (QueryException $e) {
                            $datas = "A " . $hanydikSorbanHiba . " van a hiba";
                            return view('hibaoldal', compact("datas"));
                        }

                    }
                    return $this->diakList();
                } else {
                    return view('hibaoldal', compact("datas"));
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
                ->where('deactivate', '=', '0')
                ->get(['osztaly']);
            return view("diaklist", compact("datas2"));
        } else {
            return redirect('/');
        }

    }

    public function diakListtorolt()
    {
        if (auth()->user()->hasRole('admin')) {

            $datas2 = DB::table('users')->distinct()
                ->where('osztaly', '!=', '')
                ->where('osztaly', 'not like', 'teacher')
                ->where('deactivate', '=', '1')
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
            //var_dump($request);
            // var_dump($request->osztaly);
            //exit;
            $datas = DB::table('users')->where('osztaly', 'like', $osztaly)->get();
            // ->whereNotNull('osztaly')->get();

            return view("diaklistosztalyonkent", compact("datas"));
        } else {
            return redirect('/');
        }

    }

    public function diakListOsztalyonkenttorolt(Request $request)
    {
        if (auth()->user()->hasRole('admin')) {
            $osztaly = $request->osztaly;
            $datas = DB::table('users')
                ->where('osztaly', 'like', $osztaly)
                ->where('deactivate', '=', '1')
                ->get();
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
        try
        {
            if ($this->Osztalyvizsgalat($request->osztaly) === true) {
                $pizza = DB::table('users')->where('id', '=', $diakid)
                    ->update(array
                        ('name' => $request->name,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'osztaly' => $request->osztaly,
                            'deactivate' => isset($request->deactivate) ? 1 : 0));
                /*var_dump($request->deactivate);
                echo "<br>";
                var_dump(isset($request->deactivate) );
                exit;*/
                $status = "Módosítottuk.";
                $datas2 = DB::table('users')->distinct()
                    ->where('osztaly', '!=', '')
                    ->where('osztaly', 'not like', 'teacher')
                    ->get(['osztaly']);

                return view('diakokoldala', compact("status", "datas2"));
            } else {

                return view('diakokoldala')->with('status', $this->Osztalyvizsgalat($request->osztaly));

            }

        } catch (QueryException $e) {
            $datas = "Van ilyen felhasználónév és email páros az adatbázisban.";
            return view('hibaoldal', compact("datas"));
        }

    }

    public function nyolcadikosokTorlese()
    {
        if (auth()->user()->hasRole('admin')) {

            $hova = "torles";
            return view('felugroablak', compact("hova"));
        } else {
            return redirect('/');
        }

    }

    public function osztalyokEloreLeptetese()
    {
        if (auth()->user()->hasRole('admin')) {

            $hova = "leptetes2";
            return view('felugroablak', compact("hova"));
        } else {
            return redirect('/');
        }

    }

    public function leptetes()
    {
        $data = DB::table('users')
            ->where([
                ['osztaly', 'like', '8%'],
                ['deactivate', '=', '0'],
            ])
            ->get();

        if (!$data->isEmpty()) {
            $datas = "A nyolcadikosokat még nem törölték!";
            return view('hibaoldal', compact("datas"));
        } else { $result1 = DB::select("SELECT DISTINCT osztaly FROM users
            where osztaly <>''
            and osztaly not like 'teacher'
            and
            deactivate=0
            ");

            foreach ($result1 as $osztalyok) {

                $osztalySzam = intval(substr($osztalyok->osztaly, 0, 1));
                $teljesoszttaly = $osztalyok->osztaly;
                $osztalySzam++;
                $maradekosztaly = substr($osztalyok->osztaly, 1);
                $beirando = $osztalySzam . $maradekosztaly;

                DB::update('UPDATE users SET osztaly  = ? WHERE osztaly like ?', [$beirando, $teljesoszttaly]);

            }
            return view('diakokoldala')->with('status', '');}

    }

    public function torles()
    {

        DB::table('users')
            ->where('osztaly', 'like', '8%')
            ->update(['deactivate' => 1,
                'password' => Hash::make(uniqid())]);

        return view('diakokoldala')->with('status', '');

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
