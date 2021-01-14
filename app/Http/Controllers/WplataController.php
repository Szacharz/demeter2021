<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wplatamodel;
class WplataController extends Controller
{
    function save(Request $req)
    {
        $wplatamodel= new wplatamodel;
        $wplatamodel->data=$req->data;
        $wplatamodel->tresc=$req->tresc;
        $wplatamodel->kwota_przychodu=$req->kwota_przychodu;
        $wplatamodel->save();
        return redirect('/payin');
    }
}
