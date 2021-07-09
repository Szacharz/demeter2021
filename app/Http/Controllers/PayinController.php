<?php

namespace App\Http\Controllers;
use App\Models\Groups;
use Illuminate\Http\Request;
use App\Models\Departments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class PayinController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $department_id=Auth::user()->department_id;
        $Departments = new Departments;
        $Departments = Departments::where('id', $department_id)
        ->get();
        $grupy=DB::table('grupy')
        ->join('group_members', 'grupy.id', '=', 'group_id')
        ->groupBy('grupy.id') 
         ->join('users', 'user_id', '=', 'users.id')
         ->where('department_id', $department_id)
         ->select('grupy.id','group_desc')
         ->selectRaw('GROUP_CONCAT(users.name) as "Członkowie"')
         ->get();
         $grupy->transform(function($i){
         return (array)$i;
         });
         $array = $grupy->toArray();
        return view('payin', ['grupa' => $grupy, 'departments'=>$Departments])->with('success', 'Pomyślnie dodano nowy wpis!');
    }
}
