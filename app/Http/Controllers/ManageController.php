<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Departments;
use Illuminate\Support\Facades\Auth;


class ManageController extends Controller
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
        $users = user::where('department_id', $department_id)  
        ->get();
        $department_id=Auth::user()->department_id;
        $Departments = new Departments;
        $Departments = Departments::where('id', $department_id)
        ->get();
        return view('manage', ['users'=>$users], ['departments'=>$Departments]);
    }
    function ShowData($id)
    {
        $users=user::find($id);
        return view('edit3',['users'=>$users]);
    }
    function edit3(Request $req)
    {
        $users= user::find($req->input('id'));
        $users->name=$req->name;
        $users->role=$req->role;
        $users->email=$req->email;
        $users->save();
        return redirect('/manage')->with('success', 'Pomyślnie zmieniono role użytkownikowi!');
    }


}