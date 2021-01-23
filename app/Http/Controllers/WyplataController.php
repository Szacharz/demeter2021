<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wyplatamodel;
use PDF;
class WyplataController extends Controller
{
    function save(Request $req)
    {
        $this->validate($req, [
            'tresc'=>'required',
            'kwota_rozchodu'=>'required'
        ]);
        $wyplatamodel= new wyplatamodel;
        $wyplatamodel->numer_wyplaty=$req->numer_wyplaty;
        $wyplatamodel->data=$req->data;
        $wyplatamodel->tresc=$req->tresc;
        $wyplatamodel->kwota_rozchodu=$req->kwota_rozchodu;
        $wyplatamodel->save();
        return redirect('/payout');
    }
    function ShowData($id)
    {
        $wyplata=wyplatamodel::find($id);
        return view('edit2',['wyplata'=>$wyplata]);
    }
    function Update(Request $req)
    {
        $wyplatamodel= wyplatamodel::find($req->id);
        $wyplatamodel->numer_wyplaty=$req->numer_wyplaty;
        $wyplatamodel->data=$req->data;
        $wyplatamodel->tresc=$req->tresc;
        $wyplatamodel->kwota_rozchodu=$req->kwota_rozchodu;
        $wyplatamodel->save();
        return redirect('/report');
    }
    function Delete($id)
    {
        $wyplatamodel= wyplatamodel::find($id);
        $wyplatamodel->delete();
        return redirect('/report');

    }
   
}
