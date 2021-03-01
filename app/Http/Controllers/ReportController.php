<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wyplatamodel;
use App\Models\usterkimodel;
use PDF;
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
        $usterki = usterkimodel::all()-> toArray();
        return view('report',['usterki'=>$usterki]);
    }
    
    public function createPDF() {
        // otrzymaj rekordy z bazy
        $wplata = wplatamodel::all();
        $wyplata = wyplatamodel::all();
        
  
        // udostepnianie
        view()->share('document',['wyplata'=>$wyplata, 'wplata'=>$wplata]);
        $pdf = PDF::loadView('document',['wyplata'=>$wyplata, 'wplata'=>$wplata]);
  
        // pobieranie
        return $pdf->download('raport.pdf');
      }

    public function search(Request $request)
    {   
          $dataod=$request->input('dataod');
          $datado=$request->input('datado');
  
          $usterki=usterkimodel::where('data','>=',$dataod)->where('data','<=',$datado)->get();
  
          return view('reporthis',['usterki' => $usterki]);
          
    }
}
    
