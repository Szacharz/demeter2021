<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\usterkimodel;
use Illuminate\Http\Request;



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
        $usterki = usterkimodel::whereNotNull('group_desc', "")
        ->get();
        return view('group', ['usterki'=>$usterki]);
    }


}