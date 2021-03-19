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
    $usterkimodel= usterkimodel::usterki()->id_usterki;
	$Notatki= new Notatki;
	$Notatki->tresc_nt=$req->tresc_nt;
	$Notatki->Notatki::where('id_usterki', $id_usterki)->update(array('id_usterki'=> $id_usterki));
	$Notatki=Notatki::where('id_usterki', $id_usterki)->update(array('autor'=> $user_name));
	$Notatki->save();
	return redirect('/reporthis')->with('success', 'Dodano Notatkę');
    }
}
