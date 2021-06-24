<?php

namespace App\Http\Controllers;
use App\Models\Groups;
use App\Models\GroupMembers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EditGroupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    
    {  
        $department_id=Auth::user()->department_id;
        $groups = groups::all();
        return view('editgroup');
    }

    function ShowData($id)  /** dokonczyc - najpierw musi pokazywac date i podawac id do funkcji. Potem moze edytowac. */
    {
        $department_id=Auth::user()->department_id;
        $groups=groups::find($id);
        $users= DB::table("users")
        ->where("department_id", $department_id)
        ->get();
        return view('editgroup',['grupa'=>$groups],['users'=>$users]);
    }

    // public function getUsers(Request $req)
    // {  
    //     $department_id=Auth::user()->department_id;
    //     $users = DB::table("users")
    //     ->where("department_id", $department_id)
    //     ->pluck("name", "id");
    //     return response()->json($users);
    // }

    function editgroup(Request $req)
    {
        $groups= groups::find($req->input('id'));
        $groups->group_desc=$req->group_desc;
        $groups->save();
        $GroupMembers = new GroupMembers;
        $GroupMembers->group_id=$req->id;
        $GroupMembers->user_id=$req->member1;
        $GroupMembers->user_id=$req->member2;
        $GroupMembers->save();
        return redirect('/dictionary')->with('success', 'Pomyślnie zedytowano grupę!');
    }
}