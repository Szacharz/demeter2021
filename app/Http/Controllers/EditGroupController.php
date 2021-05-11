<?php

namespace App\Http\Controllers;
use App\Models\Groups;
use Illuminate\Http\Request;



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
    {   $groups = groups::all();
        return view('editgroup');
    }

    function editgroup(Request $req)
    {
        $groups= group::find($req->input('id'));
        $groups->group_desc=$req->group_desc;
        $groups->save();
        return redirect('/dictionary')->with('success', 'Pomyślnie zedytowano grupę!');
    }
}