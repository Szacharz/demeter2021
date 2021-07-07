<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wyplatamodel;
use App\Models\usterkimodel;
use PDF;
use DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Departments;
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
        $department_id=Auth::user()->department_id;
        $Departments = new Departments;
        $Departments = Departments::where('id', $department_id)
        ->get();
        $department_id=Auth::user()->department_id;
        $usterki = usterkimodel::where('private', "0")
        ->where('status', "Niewykonane", "W trakcie") 
        ->whereNull('group_desc')
        ->where('department_id', $department_id)
        ->get();
        return view('report',['usterki'=>$usterki, 'departments'=>$Departments]]);
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
          if ($request->ajax()) {
              $data = usterkimodel::latest()->get();
              return Datatables::of($data)
                  ->addIndexColumn()
                  ->rawColumns(['action'])
                  ->make(true);
          }
      }
}
    
