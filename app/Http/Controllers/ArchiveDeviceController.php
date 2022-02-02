<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\device;
use DB;
use DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Departments;
class ArchiveDeviceController extends Controller

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
        $department_id=Auth::user()->department_id;
        $device = device::where('status', "Zwrócony")
        ->get();
        return view('archivedevice',['device'=>$device, 'departments'=>$Departments]);
    }
}
