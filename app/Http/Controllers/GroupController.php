<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\usterkimodel;
use App\Models\GroupMembers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Departments;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GroupController extends Controller
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
        $user_id=Auth::user()->id;
        $GroupMembers=GroupMembers::where('user_id',$user_id)
        ->get();
 
        $department_id=Auth::user()->department_id;
        $Departments = new Departments;
        $Departments = Departments::where('id', $department_id)
        ->get();

        $usterki = usterkimodel::where('status', "Niewykonane")
        ->whereNotNull('group_desc')
        ->where('department_id', $department_id)
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
        return view('group', ['usterki'=>$usterki, 'departments'=>$Departments, 'GroupMembers'=>$GroupMembers]);
    }
    function ChangeGroup($id_usterki)
    {  
        $todayDate = Carbon::now()->format('Y-m-d');
        $user_name=Auth::user()->name;
        $usterkimodel=usterkimodel::find($id_usterki);
        $usterki=usterkimodel::where('id_usterki', $id_usterki)->update(array('status'=> "Wykonane"));
        $usterki=usterkimodel::where('id_usterki', $id_usterki)->update(array('finisher'=> $user_name));
        $usterki=usterkimodel::where('id_usterki', $id_usterki)->update(array('finished_at'=>$todayDate));
        return redirect('/group')->with('success', 'Pomyślnie zakończono wpis!');
    }
}