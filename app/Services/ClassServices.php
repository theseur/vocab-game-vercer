<?php   
namespace App\Services;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use \Illuminate\Database\QueryException;

class ClassServices
{
    public function diakList($setView)
    {
        if (auth()->user()->hasRole('admin')||auth()->user()->hasRole('teacher')) {

            $datas2 = DB::table('users')->distinct()
                ->where('osztaly', '!=', '')
                ->where('osztaly', 'not like', 'teacher')
                ->where('deactivate', '=', '0')
                ->get(['osztaly']);
            return view($setView, compact("datas2"));
        } 
        
        else {
            return redirect('/');
        }

    }
}

?>