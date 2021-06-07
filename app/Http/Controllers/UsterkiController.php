<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usterkimodel;
use App\Models\Notatki;
use DataTables;
use Illuminate\Support\Facades\Auth;

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
    $usterkimodel->id_autora=$req->id_autora;
	$usterkimodel->deadline=$req->deadline;
	$usterkimodel->tresc=$req->tresc;
	$usterkimodel->autor=$req->autor;
    $usterkimodel->status=$req->status;
    $usterkimodel->private=$req->private;
    $usterkimodel->group_desc=$req->group_desc;
	$usterkimodel->save();
	return redirect('/payin')->with('success', 'Pomyślnie dodano nowy wpis!');
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
        $usterkimodel->importance=$req->importance;
        $usterkimodel->save();
        return redirect('/report');
    }
    function Change($id_usterki)
    {  
         $user_name=Auth::user()->name;
        $usterkimodel=usterkimodel::find($id_usterki);
        $usterki=usterkimodel::where('id_usterki', $id_usterki)->update(array('status'=> "Wykonane"));
        $usterki=usterkimodel::where('id_usterki', $id_usterki)->update(array('finisher'=> $user_name));
        return redirect('/report');
    }


    function Delete($id_usterki)
    {
        $usterkimodel= usterkimodel::find($id_usterki);
        $Notatki= Notatki::find($id_usterki);
        $Notatki->delete();
        $usterkimodel->delete();
        return redirect('/payout');

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