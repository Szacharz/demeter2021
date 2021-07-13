<?php

namespace App\Http\Controllers;
use App\Models\usterkimodel;
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
        $department_id=Auth::user()->department_id;
        $Departments = new Departments;
        $Departments = Departments::where('id', $department_id)
        ->get();
        $todayDate = Carbon::now()->format('Y-m-d');
        $user_name=Auth::user()->id;
        $department_id=Auth::user()->department_id;
        $usterki = usterkimodel::where('deadline','<',$todayDate)
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
                  ->whereNull('group_desc')
                  ->where('department_id', $department_id)
                  ->where('status', "Niewykonane");
        })
        ->get();
        return view('expiration',['usterki'=>$usterki, 'departments'=>$Departments]);
    }
}
