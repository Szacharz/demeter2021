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
        $wplatamodel->data=$req->data;
        $wplatamodel->tresc=$req->tresc;
        $wplatamodel->kwota_przychodu=$req->kwota_przychodu;
        $wplatamodel->save();
        return redirect('/payin');
    }
    function ShowData($numer_dowodu_wplaty)
    {
        return wplatamodel::find($numer_dowodu_wplaty);
    }
}
