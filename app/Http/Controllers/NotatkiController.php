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
        $Notatki=Notatki::find($id_usterki);
        $Notatki = Notatki::where('id_usterki', $id_usterki)
        ->get();
        return view('note',['usterki'=>$usterki, 'notatki'=>$Notatki]);
    }

	function save (Request $req)
    {   
        $this->validate($req, [
            'tresc_nt'=>'required'  
        ]);

        $user_name=Auth::user()->name;
        $usterkimodel= usterkimodel::find($id_usterki);
        $Notatki=new Notatki;
        $Notatki->tresc_nt=$req->tresc_nt;
        $Notatki->id_usterki=$req->id_usterki;
        $Notatki->autor=$req->autor;
        $usterki=usterkimodel::where($id_usterki)->update(array('notki'=> "Tak"));
        $Notatki->save();
        return redirect('report')->with('success', 'Pomyślnie dodano nową notatkę do wpisu!');;
    }
}
