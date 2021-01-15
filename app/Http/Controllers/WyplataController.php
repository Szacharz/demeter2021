<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wyplatamodel;
class WyplataController extends Controller
{
    function save(Request $req)
    {
        $this->validate($req, [
            'tresc'=>'required',
            'kwota_rozchodu'=>'required'
        ]);
        $wyplatamodel= new wyplatamodel;
        $wyplatamodel->data=$req->data;
        $wyplatamodel->tresc=$req->tresc;
        $wyplatamodel->kwota_rozchodu=$req->kwota_rozchodu;
        $wyplatamodel->save();
        return redirect('/payout');
    }
}
