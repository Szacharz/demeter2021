<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wplatamodel;
use App\Models\wyplatamodel;
class ReportController extends Controller

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
        $wplata = wplatamodel::all()-> toArray();
        $wyplata = wyplatamodel::all()-> toArray();
        return view('report',['wyplata'=>$wyplata, 'wplata'=>$wplata]);
    }
    
    }
