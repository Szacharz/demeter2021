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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Usterki::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action'])
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
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
          
        $search_text = $_GET['query'];

        $usterki=usterkimodel::where('tresc', 'LIKE', '%' .$search_text. '%')->get();
        return view('report',compact('usterki'));
          
      }
      
}
    
