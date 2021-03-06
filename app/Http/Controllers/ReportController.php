<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wyplatamodel;
use App\Models\usterkimodel;
use App\Models\GroupMembers;
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
        $user_id=Auth::user()->id;
        $GroupMembers=GroupMembers::where('user_id',$user_id)
        ->get();
        $department_id=Auth::user()->department_id;
        $Departments = new Departments;
        $Departments = Departments::where('id', $department_id)
        ->get();
        $name=Auth::user()->name;
        $usterki = usterkimodel::where('private', "0")
        ->where('status', "Niewykonane", "W trakcie") 
        ->where('department_id', $department_id)
        ->orWhere(function($query)
        {
            $name=Auth::user()->name;
            $department_id=Auth::user()->department_id;
            $query->where('private',"1")
                  ->where('autor', $name)
                  ->where('department_id', $department_id)
                  ->where('status', "Niewykonane");
        })
        ->get();
        return view('report',['usterki'=>$usterki, 'departments'=>$Departments, 'GroupMembers'=>$GroupMembers]);
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
    
