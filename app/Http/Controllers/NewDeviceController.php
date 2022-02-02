<?php

namespace App\Http\Controllers;
use App\Models\GroupMembers;
use Illuminate\Support\Facades\Auth;
use App\Models\Departments;
use App\Models\device;
use Illuminate\Http\Request;
use Carbon\Carbon;
class NewDeviceController extends Controller
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
        return view('newdevice',['departments'=>$Departments, 'GroupMembers'=>$GroupMembers]);
    }
    public function save(Request $req)
    {
        $this->validate($req, [
            'name'=>'required'
        ]);
        $device= new device;
        $device->data=$req->data;
        $device->name=$req->name;
        $device->towho=$req->towho;
        $device->autor=$req->autor;
        $device->info=$req->info;
        $device->status=$req->status;
        $device->save();
    
        return redirect('/borrowedequipment')->with('success', 'Pomyślnie dodano nowy wpis!');

    }
    function release($id)
    {  
        $todayDate = Carbon::now('Europe/Warsaw')->format('Y-m-d');
        $user_name=Auth::user()->name;
        $device=device::find($id);
        $device=device::where('id', $id)->update(array('status'=> "Zwrócony"));
        $device=device::where('id', $id)->update(array('finished_at'=> $todayDate));
        // $usterki=usterkimodel::where('id_usterki', $id_usterki)->update(array('finished_at'=>$todayDate));
        return redirect('/borrowedequipment')->with('success', 'Pomyślnie zwolniono sprzęt!');
    }
}
