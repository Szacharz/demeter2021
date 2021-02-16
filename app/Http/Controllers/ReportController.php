<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wplatamodel;
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
        $wplata = wplatamodel::all()-> toArray();
        $wyplata = wyplatamodel::all()-> toArray();
        return view('report',['wyplata'=>$wyplata, 'wplata'=>$wplata]);
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
    }
    
