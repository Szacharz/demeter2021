<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\usterkimodel;
use App\Models\Notatki;
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
        $usterki = usterkimodel::where('private', "0")
        ->where('status', "Niewykonane", "W trakcie") 
        ->whereNull('group_desc')
        ->get();
        return view('calendar',['usterki'=>$usterki]);
    }
}
