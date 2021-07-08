<?php

namespace App\Http\Controllers;
use App\Models\Groups;
use App\Models\GroupMembers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Departments;

class ListDepartmentsController extends Controller
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
        $AllDepartments = new Departments;
        $AllDepartments = Departments::all();
        return view('dictionary', ['AllDepartments'=>$AllDepartments, 'departments'=>$Departments]);
    }
}