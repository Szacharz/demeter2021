<?php

namespace App\Http\Controllers;
use App\Models\Groups;
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
        $users = DB::table("users")
        ->where("department_id", $department_id)
        ->pluck("name", "id");
        return view('editgroup', compact('users'));
    }

    function ShowData($id)  /** dokonczyc - najpierw musi pokazywac date i podawac id do funkcji. Potem moze edytowac. */
    {
        $groups=groups::find($id);
        return view('editgroup',['grupa'=>$groups]);
    }

    public function getUsers(Request $req)
    {  
        $department_id=Auth::user()->department_id;
        $users = DB::table("users")
        ->where("department_id", $department_id)
        ->pluck("name", "id");
        return response()->json($users);
    }

    function editgroup(Request $req)
    {
        $groups= groups::find($req->input('id'));
        $groups->group_desc=$req->group_desc;
        $groups->save();
        return redirect('/dictionary')->with('success', 'Pomyślnie zedytowano grupę!');
    }
}