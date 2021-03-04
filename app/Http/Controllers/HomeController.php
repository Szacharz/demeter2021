<?php

namespace App\Http\Controllers;
use App\Models\usterkimodel;
use Illuminate\Http\Request;

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
        $usterkimoje=usterkimodel::where('autor', "milosz")->get();
        $usterkilate=usterkimodel::where('deadline', "Później")->get();
        return view('home',['usterkimoje'=>$usterkimoje], ['usterkilate'=>$usterkilate]);
    }
    public function other()
    {
        $usterkilate=usterkimodel::where('deadline', "Później")->get();
        
        return view('home',['usterkilate'=>$usterkilate]);
    }
}
