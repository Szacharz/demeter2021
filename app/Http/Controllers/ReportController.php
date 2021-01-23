<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wplatamodel;
use App\Models\wyplatamodel;
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
        // retreive all records from db
        $wplata = wplatamodel::all();
        $wyplata = wyplatamodel::all();
        
  
        // share data to view
        view()->share('document',['wyplata'=>$wyplata, 'wplata'=>$wplata]);
        $pdf = PDF::loadView('document',['wyplata'=>$wyplata, 'wplata'=>$wplata]);
  
        // download PDF file with download method
        return $pdf->download('raport.pdf');
      }
    }
    
