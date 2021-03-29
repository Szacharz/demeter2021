<?php

namespace App\Http\Controllers;
use App\Models\Notatki;
use App\Models\usterkimodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotatkiController extends Controller
{
    function save(Request $req)
    {
	$this->validate($req, [
	    'tresc_nt'=>'required',
	]);

	$user_name=Auth::user()->name;
    $usterkimodel= usterkimodel::find($req->input('id_usterki'));
	$Notatki= new Notatki;
	$Notatki->tresc_nt=$req->tresc_nt;
	$Notatki->autor=$req->$user_name;
	$Notatki->id_usterki=$req->id_usterki;  
	$Notatki=Notatki::where('id_usterki', $id_usterki)->update(array('autor'=> $user_name)); 
	$Notatki->save();
	return redirect('/reporthis')->with('success', 'Dodano Notatkę');
    }



	function appearData($id_usterki)
    {
        $usterki=usterkimodel::find($id_usterki);
        return view('note',['usterki'=>$usterki]);
    }

	function note (Request $req)
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
}
