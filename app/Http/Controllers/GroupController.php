<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\usterkimodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        $department_id=Auth::user()->department_id;
        $usterki = usterkimodel::where('status', "Niewykonane")
        ->whereNotNull('group_desc')
        ->where('department_id', $department_id)
        ->get();
        return view('group', ['usterki'=>$usterki]);
    }


}