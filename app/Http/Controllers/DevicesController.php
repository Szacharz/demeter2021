<?php

namespace App\Http\Controllers;
use App\Models\device;
use App\Models\GroupMembers;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Departments;

class DevicesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $department_id=Auth::user()->department_id;

        $device = device::where('status', "Pożyczony")
        ->get();

        return view('borrowedequipment',['departments'=>$Departments, 'device'=>$device, 'GroupMembers'=>$GroupMembers]);
    }
    function appearData($id)
    {
        $department_id=Auth::user()->department_id;
        $Departments = new Departments;
        $Departments = Departments::where('id', $department_id)
        ->get();
        $device=device::find($id);
       
        return view('device',['device'=>$device, 'departments'=>$Departments]);
    }

    function goback($id)
    {  
        $todayDate = Carbon::now('Europe/Warsaw')->format('Y-m-d');
        $daybeforeyesterday = date("Y-m-d",strtotime($todayDate."-2 days")); 
        $user_name=Auth::user()->name;
        $device=device::find($id);
        // if($finished_at > $daybeforeyesterday)
        //      {
               $device=device::where('id', $id)->update(array('status'=> "Pożyczony"));
               $device=device::where('id', $id)->update(array('finished_at'=> ""));
               return redirect('/borrowedequipment')->with('success', 'Pomyślnie cofnięto wpis!');
        //      }
        // else
        //      {
        //     return redirect('/reporthis')->with('failure', 'Wpis nie został cofnięty. Wpis został zakończony dalej niż dwa dni temu.');
        //      }  
    }
}
