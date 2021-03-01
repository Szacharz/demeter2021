<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usterkimodel;

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
	$usterkimodel->save();
	return redirect('/payin');
    }

	function ShowData($id_usterki)
    {
        $usterki=usterkimodel::find($id_usterki);
        return view('edit',['usterki'=>$usterki]);
    }
    function Update(Request $req)
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
    function Delete($id_usterki)
    {
        $usterkimodel= usterkimodel::find($id_usterki);
        $usterkimodel->delete();
        return redirect('/report');

    }
}