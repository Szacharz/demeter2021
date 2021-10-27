<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wyplatamodel;
use App\Models\usterkimodel;
use App\Models\GroupMembers;
use App\Models\Departments;
use App\Models\CustomSearch;
use PDF;
use DataTables;
use DB;
use Illuminate\Support\Facades\Auth;
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

 //pobranie wpisów z uwzględnieniem dodatkowego filtru
      if (CustomSearch::where('user_id', '=', $user_id)->exists())
      {
         // tutaj query z paremtrami custom_searchu
            $zmienna2=DB::table('custom_search')->where('user_id', $user_id)->value('groups');
            if ($zmienna2 == 0)
            {
                $usterki = usterkimodel::where('private', "0")
                ->where('status', "Niewykonane", "W trakcie") 
                ->where('department_id', $department_id)
                ->where('group_desc',null)
                ->orWhere(function($query)
                {
                    $user_id=Auth::user()->id;
                    $zmienna1=DB::table('custom_search')->where('user_id', $user_id)->value('private');
                    $name=Auth::user()->name;
                    $department_id=Auth::user()->department_id;
                    $query->where('private', $zmienna1)
                        ->where('group_desc',null)
                        ->where('autor', $name)
                        ->where('department_id', $department_id)
                        ->where('status', "Niewykonane");
                })
                ->get();
            }       
            else 
            {
                $usterki = usterkimodel::where('private', "0")
                ->where('status', "Niewykonane", "W trakcie") 
                ->where('department_id', $department_id)
                ->orWhere(function($query)
                {
                    $user_id=Auth::user()->id;
                    $zmienna1=DB::table('custom_search')->where('user_id', $user_id)->value('private');
                    $name=Auth::user()->name;
                    $department_id=Auth::user()->department_id;
                    $query->where('private', $zmienna1)
                        ->where('autor', $name)
                        ->where('department_id', $department_id)
                        ->where('status', "Niewykonane");
                })
                ->get();
            }
        }
      else
      {
           // pobierz wszystkie rekordy bez ustalonego filtru
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
      }

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


      //filtry dotyczące filtrów w ogólnej liście wpisów
      public function applysearch(Request $req)
      {
          
         $user_id=Auth::user()->id; 
         $privateshown=$req->input('privateshow');
         $groupshown=$req->input('groupshow');
         if (CustomSearch::where('user_id', '=', $user_id)->exists())
        {
            $customsearch=CustomSearch::where('user_id', $user_id)->update(array('private'=> $privateshown));
            $customsearch=CustomSearch::where('user_id', $user_id)->update(array('groups'=>$groupshown)); 
        }
        else
        {
            $customsearch= new customsearch;
            $customsearch-> user_id=$user_id;
            $customsearch -> private=$req->input('privateshow');
            $customsearch->  groups=$req->input('groupshow');
            $customsearch->save();
        }
        return redirect('/report')->with('success', 'Pomyślnie zapisano filtr!');
      }
}
    
