<?php

namespace App\Http\Controllers;
use App\Models\usterkimodel;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;

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
        // $inweek = Carbon::now()->addDays(7)->format('Y-m-d');
        //  echo $inweek->startofWeek();
        $usterkilate=usterkimodel::where('deadline', 'Później')
        ->where('status', "Niewykonane")
        ->where('private', "0")
        ->get();
        return view('home',['usterkilate'=>$usterkilate]);
    }
}
