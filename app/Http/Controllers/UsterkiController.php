<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usterkimodel;

class UsterkiController extends Controller
{
    function save(Request $req)
    {
	$this->validate($req, [
	    'place'=>'required',
	    'tresc'=>'required',
	    'autor'=>'required'
	]);
	$usterkimodel= new usterkimodel;
	$usterkimodel->place=$req->place;
	$usterkimodel->data=$req->data;
	$usterkimodel->tresc=$req->tresc;
	$usterkimodel->autor=$req->autor;
	$usterkimodel->save();
	return redirect('/payin');
    }
    
}