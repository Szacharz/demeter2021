<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;



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
        $users = user::where('role', "Standard")
        ->orWhere('role', "Admin")  
        ->get();
        return view('manage', ['users'=>$users]);
    }
    function ShowData($id)
    {
        $users=user::find($id);
        return view('edit3',['users'=>$users]);
    }
    function edit3(Request $req)
    {
        $users= user::find($req->input('id'));
        $users->role=$req->role;
        $users->save();
        return redirect('/manage');
    }

}