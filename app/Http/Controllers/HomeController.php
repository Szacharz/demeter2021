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
        return view('home');
    }
    function MineOnes(Request $request)
    {
        $usterkimodel= new usterkimodel;
        $usterki=usterkimodel::where('autor', {{Auth::user()->name }});
        return view('home',['usterki'=>$usterki]);
    }
}
