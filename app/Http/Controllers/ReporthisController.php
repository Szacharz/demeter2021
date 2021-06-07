<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wplatamodel;
use App\Models\usterkimodel;
use DB;
use DataTables;
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
        $usterki = usterkimodel::where('private', "0")
        ->where('status', "Wykonane")
        ->get();
        return view('reporthis',['usterki'=>$usterki]);
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
