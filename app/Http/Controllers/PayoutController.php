<?php

namespace App\Http\Controllers;
use App\Models\usterkimodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Departments;
class PayoutController extends Controller
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
        $user_name=Auth::user()->name;
        $id_autora=Auth::user()->id;
        $department_id=Auth::user()->department_id;
        $usterki = usterkimodel::where('private', "1")
        ->where('id_autora', $id_autora)
        ->where('status', 'Niewykonane')
        ->where('department_id', $department_id)
        ->get();
        return view('payout',['usterki'=>$usterki, 'departments'=>$Departments]);
    }
}
