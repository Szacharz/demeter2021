<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wplatamodel;
use App\Models\usterkimodel;
use DB;
use DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Departments;
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
        $department_id=Auth::user()->department_id;
        $Departments = new Departments;
        $Departments = Departments::where('id', $department_id)
        ->get();
        $department_id=Auth::user()->department_id;
        $usterki = usterkimodel::where('private', "0")
        ->where('status', "Wykonane")
        ->where('department_id', $department_id)
        ->get();
        return view('reporthis',['usterki'=>$usterki, 'departments'=>$Departments]));
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

    public function getUsterki(Request $request)
    {
        if ($request->ajax()) {
            $data = usterkimodel::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
