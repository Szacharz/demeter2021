<?php

namespace App\Http\Controllers;
use App\Models\usterkimodel;
use App\Models\GroupMembers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Departments;

class ExpirationController extends Controller
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
    {       /** $usterkimodel->place=$req->place; */
        $user_id=Auth::user()->id;
        $department_id=Auth::user()->department_id;
        $GroupMembers=GroupMembers::where('user_id',$user_id)
        ->get();
        $Departments = new Departments;
        $Departments = Departments::where('id', $department_id)
        ->get();
        $todayDate = Carbon::now()->format('Y-m-d');
        $user_name=Auth::user()->id;
        $department_id=Auth::user()->department_id;
        $usterki = usterkimodel::where('deadline','<',$todayDate)
        ->where('private', "0")
        ->where('status', "Niewykonane", "W trakcie")
        ->where('department_id', $department_id)
        ->orWhere(function($query)
        {
            $todayDate = Carbon::now()->format('Y-m-d');
            $name=Auth::user()->name;
            $department_id=Auth::user()->department_id;
            $query->where('private',"1")
                ->where('deadline','<',$todayDate)
                  ->where('autor', $name)
                  ->where('department_id', $department_id)
                  ->where('status', "Niewykonane");
        })
        ->get();
        return view('expiration',['usterki'=>$usterki, 'departments'=>$Departments,'GroupMembers'=>$GroupMembers]);
    }
    function ChangeExpiration($id_usterki)
    {  
        $todayDate = Carbon::now()->format('Y-m-d');
        $user_name=Auth::user()->name;
        $usterkimodel=usterkimodel::find($id_usterki);
        $usterki=usterkimodel::where('id_usterki', $id_usterki)->update(array('status'=> "Wykonane"));
        $usterki=usterkimodel::where('id_usterki', $id_usterki)->update(array('finisher'=> $user_name));
        $usterki=usterkimodel::where('id_usterki', $id_usterki)->update(array('finished_at'=>$todayDate));
        return redirect('/expiration')->with('success', 'Pomyślnie zakończono wpis!');
    }
}
