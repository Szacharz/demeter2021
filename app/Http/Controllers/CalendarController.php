<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\usterkimodel;
use App\Models\Notatki;
use App\Models\Departments;
use DataTables;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
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
        $usterki = usterkimodel::where('private', "0")
        ->where('status', "Niewykonane", "W trakcie") 
        ->whereNull('group_desc')
        ->where('department_id', $department_id)
        ->get();
        $Departments = new Departments;
        $Departments = Departments::where('id', $department_id)
        ->get();
        return view('calendar',['usterki'=>$usterki, 'departments'=>$Departments]);
    }
}
