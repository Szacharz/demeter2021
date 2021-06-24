<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Groups;
use Illuminate\Http\Request;
use App\Models\GroupMembers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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
    $department_id=Auth::user()->department_id;
	$groups= new groups;
	$groups->group_desc=$req->group_desc;
	$groups->save();
    $users= DB::table("users")
    ->where("department_id", $department_id)
    ->get();
    $GroupMembers = new GroupMembers;
    $GroupMembers->group_id=$req->id;
    $GroupMembers->user_id=$req->member1;
    $GroupMembers->save();
    $GroupMembers = new GroupMembers;
    $GroupMembers->group_id=$req->id;
    $GroupMembers->user_id=$req->member2;
    $GroupMembers->save();
	return redirect('/dictionary', ['users'=>$users])->with('success', 'Pomyślnie utworzono grupe!');
    }
}