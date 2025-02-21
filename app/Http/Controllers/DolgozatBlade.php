<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Szoszedet;
use App\Models\Targytemakor;
use App\Models\Ropdolgozat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Spatie\Permission\Models\Role;
use \Illuminate\Database\QueryException;
use App\Services\ClassServices;
use App\Http\Resources\Ropbeallitas;
use Carbon\Carbon;
use DateTime;

class DolgozatBlade extends Controller
{
    public function isDiak()
    {
        if (auth()->user()->hasRole('user')) {
            return view('dolgozat')->with('status', '');
        } else {
            return redirect('/');
        }

    }

    public function dolgozatdiak()
    {

        $date = date('Y-m-d');

        $my_date_time = date("Y-m-d H:i:s", strtotime("+1 hours"));

        $osztaly=auth()->user()->osztaly;
        $date = Carbon::now();
        $date= $date->setMinute(00)->setSecond(00)->toDateTimeString();
       
        $date1=Carbon::now()->addHour()->setMinute(00)->setSecond(00)->toDateTimeString();

        $datas = DB::table('ropbeallitas')
            ->join('targytemakor', 'targytemakor.id', '=', 'ropbeallitas.temakorid')
            ->where('osztaly', 'like', $osztaly)
            ->where('datum', '>=',  $date)
            ->where('datum','<',$date1)
            ->get('ropbeallitas.temakorid');
           // dd($date);
           // dd($datas);

        return view('dolgozat')->with('status', $datas);
    }

}
