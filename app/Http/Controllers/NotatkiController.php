<?php

namespace App\Http\Controllers;
use App\Models\Notatki;
use App\Models\usterkimodel;
use Illuminate\Http\Request;

class NotatkiController extends Controller
{
    function save(Request $req)
    {
	$this->validate($req, [
	    'tresc_nt'=>'required',
	]);
    $usterkimodel= usterkimodel::find($req->input('id_usterki'));
	$Notatki= new Notatki;
	$Notatki->tresc_nt=$req->tresc_nt;
	$Notatki=usterkimodel::where('id_usterki', $id_usterki)->update(array('id_usterki'=> $id_usterki));
	$Notatki->save();
	return redirect('/reporthis')->with('success', 'Dodano Notatkę');
    }
}
