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
        $department_id=Auth::user()->department_id;
        $users= DB::table("users")
    ->where("department_id", $department_id)
    ->get();
        return view('newgroup', ['users'=>$users]);
    }
    
    function save(Request $req)
    {
	$this->validate($req, [
	    'group_desc'=>'required',
	]);
	$groups= new groups;
	$groups->group_desc=$req->group_desc;
    $groups->member1=$req->member1;
    $groups->member2=$req->member2;
    $groups->member3=$req->member3;
    $groups->member4=$req->member4;
	$groups->save();


    $GroupMembers = new GroupMembers;
    $GroupMembers->group_id=$groups->id;
    $GroupMembers->user_id=$req->member1;
    $GroupMembers->save();
    $GroupMembers = new GroupMembers;
    $GroupMembers->group_id=$groups->id;
    $GroupMembers->user_id=$req->member2;
    $GroupMembers->save();
    $GroupMembers = new GroupMembers;
    $GroupMembers->group_id=$groups->id;
    $GroupMembers->user_id=$req->member3;
    $GroupMembers->save();
    
	return redirect('/dictionary')->with('success', 'Pomyślnie utworzono grupe!');
    }
}