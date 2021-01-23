<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wplatamodel;
use DB;

class ReporthisController extends Controller

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
  
        return view('reporthis',['wplata'=>$wplata]);
    }
    function ShowData($id)
    {
        $wplata=wplatamodel::find($id);
        return view('edit',['wplata'=>$wplata]);
    }
    public function reportrange()
    {
        $wplata= DB::table('wplata')
        ->select()->get();
        return view('reporthis',compact('query'));
    }
    public function search(Request $request)
    {   
        $dataod=$request->input('dataod');
        $datado=$request->input('datado');

        $wplata=wplatamodel::where('data','>=',$dataod)->where('data','<=',$datado)->get();

        return view('reporthis',['wplata' => $wplata]);
        
    }
    
}
