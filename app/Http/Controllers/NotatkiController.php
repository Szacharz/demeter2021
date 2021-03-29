<?php

namespace App\Http\Controllers;
use App\Models\Notatki;
use App\Models\usterkimodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotatkiController extends Controller
{
	function appearData($id_usterki)
    {
        $usterki=usterkimodel::find($id_usterki);
        return view('note',['usterki'=>$usterki]);
    }

	function note (Request $req)

    {   
        $this->validate($req, [
            'tresc_nt'=>'required',
            'autor'=>'required',  
        ]);
        $user_name=Auth::user()->name;
        $usterkimodel= usterkimodel::find($req->input('id_usterki'));
        $Notatki->tresc_nt=$req->tresc_nt;
        $Notatki->id_usterki=$req->id_usterki;
        $Notatki=Notatki::where('id_usterki', $id_usterki)->update(array('autor'=> $user_name)); 
        $Notatki->save();
        return redirect('/payout')->with('success', 'Dodano Notatkę');
    }
}
