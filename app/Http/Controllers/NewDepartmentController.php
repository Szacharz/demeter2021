<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departments;
use App\Models\Groups;
use Illuminate\Http\Request;
use App\Models\GroupMembers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class NewDepartmentController extends Controller
{
    public function index()
    {
        $department_id=Auth::user()->department_id;
        $users= DB::table("users")
    ->where("department_id", $department_id)
    ->get();
	return view('newdepartment');
    }

    public function save(Request $req)
    {
        {
            $this->validate($req, [
            'departments'=>'required',
            ]);
            $Departments= new Departments;
            $Departments->departments=$req->departments;
            $Departments->save();
         return redirect('/listdepartments')->with('success', 'Pomyślnie utworzono grupe!');
        }
    }
}