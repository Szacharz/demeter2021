<?php

namespace App\Http\Controllers;
use App\Models\usterkimodel;
use App\Models\GroupMembers;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Departments;

class HomeController extends Controller
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
        $inweek = Carbon::now()->addDays(7)->startofWeek()->format('Y-m-d');
        $usterkilate=usterkimodel::where('deadline', '>=', $inweek)
        ->where('status', "Niewykonane")
        ->where('private', "0")
        ->where('department_id', $department_id)
        ->orWhere(function($query)
        {
            $department_id=Auth::user()->department_id;
            $query->where('deadline', null)
                ->where('status', "Niewykonane")
                ->where('private', "0")
                ->where('department_id', $department_id);
        })
        ->get();
        return view('home',['usterkilate'=>$usterkilate, 'departments'=>$Departments, 'GroupMembers'=>$GroupMembers]);
    }
}
