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
	$groups->save();


    $GroupMembers = new GroupMembers;
    $GroupMembers->group_id=$groups->id;
    $GroupMembers->user_id=$req->member;
    $GroupMembers = new GroupMembers;
    $GroupMembers->group_id=$groups->id;
    $GroupMembers->user_id=$req->member2;
    $GroupMembers->save();
    
	return redirect('/dictionary')->with('success', 'Pomyślnie utworzono grupe!');
    }


    public function addMore(Request $request)
    {
        $rules = [];


        foreach($request->input('name') as $key => $value) {
            $rules["name.{$key}"] = 'required';
        }


        $validator = Validator::make($request->all(), $rules);


        if ($validator->passes()) {

            return response()->json(['success'=>'done']);
        }


        return response()->json(['error'=>$validator->errors()->all()]);
    }
}