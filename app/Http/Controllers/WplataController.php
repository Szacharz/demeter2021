<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wplatamodel;
class WplataController extends Controller
{
    function save(Request $req)
    {
        $this->validate($req, [
            'tresc'=>'required',
            'kwota_przychodu'=>'required'
        ]);
        $wplatamodel= new wplatamodel;
        $wplatamodel->numer_wplaty=$req->numer_wplaty;
        $wplatamodel->data=$req->data;
        $wplatamodel->tresc=$req->tresc;
        $wplatamodel->kwota_przychodu=$req->kwota_przychodu;
        $wplatamodel->save();
        return redirect('/payin');
    }
    function ShowData($id)
    {
        $wplata=wplatamodel::find($id);
        return view('edit',['wplata'=>$wplata]);
    }
    function Update(Request $req)
    {
        $wplatamodel= wplatamodel::find($req->id);
        $wplatamodel->numer_wplaty=$req->numer_wplaty;
        $wplatamodel->data=$req->data;
        $wplatamodel->tresc=$req->tresc;
        $wplatamodel->kwota_przychodu=$req->kwota_przychodu;
        $wplatamodel->save();
        return redirect('/report');
    }
    function Delete($id)
    {
        $wplatamodel= wplatamodel::find($id);
        $wplatamodel->delete();
        return redirect('/report');

    }
}
