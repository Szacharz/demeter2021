<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wyplatamodel;
class WyplataController extends Controller
{
    function save(Request $req)
    {
        $wplatamodel= new wyplatamodel;
        $wplatamodel->data=$req->data;
        $wplatamodel->tresc=$req->tresc;
        $wplatamodel->kwota_rozchodu=$req->kwota_rozchodu;
        $wplatamodel->save();
    }
}
