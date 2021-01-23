<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wplatamodel;
use App\Models\wyplatamodel;
class DocumentController extends Controller
{
    public function index()
    {
        $wplata = wplatamodel::all()-> toArray();
        $wyplata = wyplatamodel::all()-> toArray();
        return view('report',['wyplata'=>$wyplata, 'wplata'=>$wplata]);
    }
}
