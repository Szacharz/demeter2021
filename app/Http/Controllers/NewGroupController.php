<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Groups;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;



class NewGroupController extends Controller
{
    public function index()
    {
        return view('newgroup');
    }
    
    function save(Request $req)
    {
	$this->validate($req, [
	    'group_desc'=>'required',
	]);
	$groups= new groups;
	$groups->group_desc=$req->group_desc;
	$groups->save();
	return redirect('/dictionary')->with('success', 'Pomyślnie utworzono grupe!');
    }
}