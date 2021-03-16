<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usterkimodel;
use DataTables;

class UsterkiController extends Controller
{

    function save(Request $req)
    {
	$this->validate($req, [
	    'tresc'=>'required',
	    'autor'=>'required',
		'deadline'=>'required'
	]);
	$usterkimodel= new usterkimodel;
	$usterkimodel->place=$req->place;
	$usterkimodel->data=$req->data;
	$usterkimodel->deadline=$req->deadline;
	$usterkimodel->tresc=$req->tresc;
	$usterkimodel->autor=$req->autor;
    $usterkimodel->status=$req->status;
    $usterkimodel->private=$req->private;
	$usterkimodel->save();
	return redirect('/payin');
    }

	function ShowData($id_usterki)
    {
        $usterki=usterkimodel::find($id_usterki);
        return view('edit',['usterki'=>$usterki]);
    }
    function edit(Request $req)
    {
        $usterkimodel= usterkimodel::find($req->input('id_usterki'));
        $usterkimodel->place=$req->place;
        $usterkimodel->data=$req->data;
        $usterkimodel->tresc=$req->tresc;
        $usterkimodel->autor=$req->autor;
		$usterkimodel->deadline=$req->deadline;
		$usterkimodel->status=$req->status;
        $usterkimodel->save();
        return redirect('/report');
    }
    function Change($id_usterki)
    {
        $usterkimodel=usterkimodel::find($id_usterki);
        $usterki=usterkimodel::where('ID', $id_usterki)
        ->update('status', "Wykonane");
        return redirect('/report');

    }


    function Delete($id_usterki)
    {
        $usterkimodel= usterkimodel::find($id_usterki);
        $usterki=usterkimodel::where('');
        return redirect('/report');

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